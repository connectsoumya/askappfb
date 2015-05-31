[![Build Status]

## Installation

Upload everything to the server to run. There are few changes which needs to be done.
The main files for the web page, 'index.php' and 'senddata.php' can be found under the directory 'web'.

### Packages used

Facebook SDK for PHP
Flintstone
ext-mbstring

    They are already added to composer.json file.

### Configurations

1) In line 25 of 'index.php', the page access token corresponds to our page created for experiments. To fetch data from your page, replace it with your own page access token which can be obtained from facebook.
2) In line 37 of 'index.php' and line 15 of 'senddata.php', the following changes are required to use it for your own facebook application
		FacebookSession::setDefaultApplication('YOUR APP ID', 'YOUR APP SECRET');
   Your app id and app secret can be obtained from facebook from your app dashboard.
3) In line 38 of 'index.php' and line 16 of 'senddata.php', change the URL to your own home page URL for your app.
4) In line 58 of 'index.php' and line 37 of 'senddata.php', change the number with your own facebook page ID.
5) In line 59 of 'senddata.php', change the URL as per the following:
		https://graph.facebook.com/YOUR PAGE ID/feed?fields=message%2Ccomments%2Clikes&access_token=<YOUR PAGE ACCESS TOKEN>

### Experiments and Results

We posted 8 questions in the facebook page http://www.facebook.com/askmmnet.
more than 100 Facebook users were invited to answer and vote on this page. The index.php file under /doc contains the code to extract the results of the experiment
from Facebook. The results.jpg file contains a screenshot of how the results are shown in a browser. 

## How To Ask For Help

When asking for support, or while providing feedback in the form of bugs or
feature requestes, please include the following relevant information:

 - Detailed steps on how to reproduce the problem, including a script that
   reproduces your problem, if possible. 
 

### Support / Feedback

For issues with, questions about, or feedback please contact us on (Email- pritamrulezgre@gmail.com) & (Email- connectsoumya@gmail.com)


## Credits

Soumya Shubhra Ghosh
Pritam Bose 
