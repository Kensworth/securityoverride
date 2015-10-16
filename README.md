# securityoverride
Attemping to crack the last challenge on securityoverride.org, where the goal is to execute phpinfo() on the page

Thought process so far:

The website utilizes a get requested field "highlight" which takes that as an input into PHP's preg_replace's pattern match.
Therefore, www.examplesite/regex.php?highlight=blahblahblah will send $_GET['highlight'], the string "blahblahblah" into a backend script (to the best of my limited, yet growing knowledge gained through poking around in the black box that is the backend script):

$string = "exampletext";
$string = preg_replace("/" . $_GET['highlight'] . "/", '$0 * $1', "$string");


The method, as best I can deduce, is to inject code that overrides/overwrites the original code, such that PHP evaluates the injected pattern as phpinfo() using the /e modifier, but at the same time ignores the rest of the real code, which is harmless.
My thought process involved trying the exit() command with exit(phpinfo()) but then after a couple scores of tries with compilation errors, I am now facepalming and realizing that /* would probably be the right course of action, ignoring the rest of the code, which will not compile due to my tinkering.

Update (Oct 15, 2015): Instead of trying the XSS-esque route, I've realized that PHP cannot be escaped as such, therefore researching into null byte injections have led me to believe that I must phrase an injection that both matches the $string and also runs phpinfo() through the /e modifier. The way I am going to attempt this is through trying to find a way for $_GET['highlight'] to execute in $string = preg_replace("/". $regex . "/", $_GET['highlight'] . ' * $1', $string); and do those two tasks simultaneously without error 

I did some researching into null byte injections, and the concept makes a lot of sense to me, as null bytes signify the end of a string in memory in C. However, most descriptions of the injection assume that the user can alter two get parameters, one being the regex pattern (the highlight portion) and the other being the replacement. However I don't think that's possible in Realistic 7, correct me if I'm wrong, though.

I've induced that the script must look something similar to:

$string = "bluechill";
$string = preg_replace("/". $_GET['highlight'] . "/", $_GET['highlight'] . ' * $1', $string);
echo $string;

It seems as if the second parameter in preg_replace is merely the get parameter 'highlight' with an <img> tag and the rest of the unmatched string appended to it, so am I right to assume that the goal here is to inject a string that both matches $string and executes phpinfo() while also being valid php code? 

So, something along the lines of "blue|phpinfo()/e%00" is the style of injection I'm going to attempt next.

Update (October 16th, 2015): Security Override site seems to be down, seems as if the admin stopped paying for hosting. Hoping this doesn't spell the end of the journey.

Update (October 16th, 2015, 6:00pm): Security Override is back online but down for maintenance. Current strategy involves null byte injection with a comment // at the end, but the question of how to make it valid php code that both matches the string and executes code is beyond me. Currently testing in my faux backend and certain variations of ${phpinfo()}|blue/e%00 are getting closer.
