<!--

/*
 *
 * Copyright 2013 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

-->

<!DOCTYPE html>
<html>
<head>
  <title>Google+ JavaScript Quickstart</title>
  <script src="https://apis.google.com/js/client:platform.js" async defer></script>
  <!-- JavaScript specific to this application that is not related to API
     calls -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" ></script>
</head>
<body>
  <div id="gConnect">
    <button class="g-signin"
        data-scope="https://www.googleapis.com/auth/plus.login"
        data-requestvisibleactions="http://schemas.google.com/AddActivity"
        data-clientId="343412736250-nhcfb4gp8b6m625v1ik1vq3evv5v2hcm.apps.googleusercontent.com"
        data-callback="onSignInCallback"
        data-theme="dark"
        data-cookiepolicy="single_host_origin">
    </button>
  </div>
  <div id="authOps" >
    <h2>User is now signed in to the app using Google+</h2>
    <p>If the user chooses to disconnect, the app must delete all stored
    information retrieved from Google for the given user.</p>
    <button id="disconnect" >Disconnect your Google account from this app</button>

    <h2>User's profile information</h2>
    <div id="profile"></div>

    <h2>User's friends that are visible to this app</h2>
    <div id="visiblePeople"></div>

    <h2>Authentication Logs</h2>
    <pre id="authResult"></pre>
  </div>
  <div id="loaderror">
    This section will be hidden by JQuery. If you can see this message, you
    may be viewing the file rather than running a web server.<br />
    The sample must be run from http or https. See instructions at
    <a href="https://developers.google.com/+/quickstart/javascript">
    https://developers.google.com/+/quickstart/javascript</a>.
  </div>
<script type="text/javascript">
var helper = (function() {
  var BASE_API_PATH = 'plus/v1/';

  return {
    /**
     * Hides the sign in button and starts the post-authorization operations.
     *
     * @param {Object} authResult An Object which contains the access token and
     *   other authentication information.
     */
    onSignInCallback: function(authResult) {
      gapi.client.load('plus','v1').then(function() {
        $('#authResult').html('Auth Result:<br/>');
        for (var field in authResult) {
          //$('#authResult').append(' ' + field + ': ' + authResult[field] + '<br/>');
        }
        if (authResult['access_token']) {
          $('#authOps').show('slow');
          $('#gConnect').hide();
          helper.profile();
          helper.people();
        } else if (authResult['error']) {
          // There was an error, which means the user is not signed in.
          // As an example, you can handle by writing to the console:
          console.log('There was an error: ' + authResult['error']);
          $('#authResult').append('Logged out');
          //$('#authOps').hide('slow');
          $('#gConnect').show();
        }
        console.log('authResult', authResult);
      });
    },

    /**
     * Calls the OAuth2 endpoint to disconnect the app for the user.
     */
    disconnect: function() {
      // Revoke the access token.
      $.ajax({
        type: 'GET',
        url: 'https://accounts.google.com/o/oauth2/revoke?token=' +
            gapi.auth.getToken().access_token,
        async: false,
        contentType: 'application/json',
        dataType: 'jsonp',
        success: function(result) {
          console.log('revoke response: ' + result);
          $('#authOps').hide();
          $('#profile').empty();
          $('#visiblePeople').empty();
          $('#authResult').empty();
          $('#gConnect').show();
        },
        error: function(e) {
          console.log(e);
        }
      });
    },

    /**
     * Gets and renders the list of people visible to this app.
     */
    people: function() {
      gapi.client.plus.people.list({
        'userId': 'me',
        'collection': 'visible' 
      }).then(function(res) {
        var people = res.result;
        $('#visiblePeople').empty();
        $('#visiblePeople').append('Number of people visible to this app: ' +
            people.totalItems + '<br/>');
        for (var personIndex in people.items) {
          person = people.items[personIndex];
          $('#visiblePeople').append('<img src="' + person.image.url + '">');
        }
      });
    },

    /**
     * Gets and renders the currently signed in user's profile data.
     */
    profile: function(){
      gapi.client.plus.people.get({
        'userId': 'me'
      }).then(function(res) {
        var profile = res.result;
        $('#profile').empty();
        $('#profile').append(
            $('<p><img src=\"' + profile.image.url + '\"></p>'));
        $('#profile').append(
            $('<p>Hello ' + profile.displayName + '!<br />Tagline: ' +
            profile.tagline + '<br />About: ' + profile.aboutMe + '</p>'));
        if (profile.cover && profile.coverPhoto) {
          $('#profile').append(
              $('<p><img src=\"' + profile.cover.coverPhoto.url + '\"></p>'));
        }
      }, function(err) {
        var error = err.result;
        $('#profile').empty();
        $('#profile').append(error.message);
      });
    }
  };
})();

/**
 * jQuery initialization
 */
$(document).ready(function() {
  $('#disconnect').click(helper.disconnect);
  $('#loaderror').hide();
  if ($('[data-clientid="343412736250-nhcfb4gp8b6m625v1ik1vq3evv5v2hcm.apps.googleusercontent.com"]').length > 0) {
    alert('This sample requires your OAuth credentials (client ID) ' +
        'from the Google APIs console:\n' +
        '    https://code.google.com/apis/console/#:access\n\n' +
        'Find and replace 343412736250-nhcfb4gp8b6m625v1ik1vq3evv5v2hcm.apps.googleusercontent.com with your client ID.'
    );
  }
});

/**
 * Calls the helper method that handles the authentication flow.
 *
 * @param {Object} authResult An Object which contains the access token and
 *   other authentication information.
 */
function onSignInCallback(authResult) {
  helper.onSignInCallback(authResult);
}
</script>
</body>
</html>
