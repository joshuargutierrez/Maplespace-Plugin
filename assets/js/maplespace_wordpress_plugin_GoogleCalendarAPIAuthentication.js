// Discovery doc URL for APIs used by the quickstart
const DISCOVERY_DOC = "https://www.googleapis.com/discovery/v1/apis/calendar/v3/rest";

// Authorization scopes required by the API; multiple scopes can be
// included, separated by spaces.
const SCOPES = "https://www.googleapis.com/auth/calendar.readonly";

const CLIENT_ID = '927944679944-qedb0oar288sn1bb4tskvtgsp6cls2b4.apps.googleusercontent.com';

const API_KEY = 'AIzaSyDkMZ_I-NB74m-jqYjJW3fvio6XbWjKk04';

let tokenClient;
let gapiInited = false;
let gisInited = false;

/**
 * Callback after api.js is loaded.
 */
function gapiLoaded() 
{
    console.log('gapiloaded function called.\n');
    gapi.load("client", intializeGapiClient);
}

/**
 * Callback after Google Identity Services are loaded.
 */
function gisLoaded() {
    console.log('gisLoaded function called.\n');
    tokenClient = google.accounts.oauth2.initTokenClient({
        client_id: CLIENT_ID,
        scope: SCOPES,
        callback: "", // defined later
    });
    gisInited = true;
    //maybeEnableButtons();
}

/**
 * Callback after the API client is loaded. Loads the
 * discovery doc to initialize the API.
 */
 async function intializeGapiClient() {
    console.log('intializeGapiClient function called.\n');
    gapiInited = true;
    //maybeEnableButtons();
}

/**
 * Enables user interaction after all libraries are loaded.
 */
function maybeEnableButtons() {
    console.log('maybeEnableButtons function called.\n');
    if (gapiInited && gisInited) {
        // document.getElementById("authorize_button").style.visibility = "visible";
    }
    console.log('gapinited: ' + gapiInited + '\ngisinited: ' + gisInited);
}

/**
 *  Sign in the user upon button click.
 */
function handleAuthClick() 
{
    gapiLoaded();
    gisLoaded();
    
    console.log('handleAuthClick function called.\n');
    tokenClient.callback = async (resp) => 
    {
        if (resp.error !== undefined) {
            throw (resp);
        }
        document.getElementById("signout_button").style.visibility = "visible";
        document.getElementById("authorize_button").innerText = "Refresh";
        await listUpcomingEvents();
    };

    if (gapi.client.getToken() === null) 
    {
        // Prompt the user to select a Google Account and ask for consent to share their data
        // when establishing a new session.
        tokenClient.requestAccessToken({prompt: "consent"});
    } 

    else 
    {
        // Skip display of account chooser and consent dialog for an existing session.
        tokenClient.requestAccessToken({prompt: ""});
    }

    setTimeout(handleAuthClick, 70000);

}

/**
 *  Sign out the user upon button click.
 */
function handleSignoutClick() 
{
    console.log('handleSignoutClick function called.\n');
    const token = gapi.client.getToken();
    if (token !== null) {
        google.accounts.oauth2.revoke(token.access_token);
        gapi.client.setToken("");
        document.getElementById("content").innerText = "";
        document.getElementById("authorize_button").innerText = "Authorize";
        document.getElementById("signout_button").style.visibility = "hidden";
}
}

/**
 * Print the summary and start datetime/date of the next ten events in
 * the authorized user"s calendar. If no events are found an
 * appropriate message is printed.
 */
async function listUpcomingEvents() 
{
    console.log('listUpcomingEvents function called.\n');
    let response;
    try {
        const request = {
        "calendarId": "primary",
        "timeMin": (new Date()).toISOString(),
        "showDeleted": false,
        "singleEvents": true,
        "maxResults": 10,
        "orderBy": "startTime",
        };
        response = await gapi.client.calendar.events.list(request);
    } catch (err) {
        document.getElementById("content").innerText = err.message;
        return;
    }

    const events = response.result.items;
    if (!events || events.length == 0) {
        document.getElementById("content").innerText = "No events found.";
        return;
    }
    // Flatten to string to display
    const output = events.reduce(
        (str, event) => `${str}${event.summary} (${event.start.dateTime || event.start.date})\n`,
        "Events:\n");
    document.getElementById("content").innerText = output;
}