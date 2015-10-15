# securityoverride
Attemping to crack the last challenge on securityoverride.org, where the goal is to execute phpinfo() on the page

Thought process so far:

The website utilizes a get requested field "highlight" which takes that as an input into PHP's preg_replace's pattern match.
Therefore, www.examplesite/regex.php?highlight=blahblahblah will send $_GET['highlight'], the string "blahblahblah" into a backend script (to the best of my limited, yet growing knowledge gained through poking around in the black box that is the backend script):

$string = "exampletext";
$string = preg_replace("/" . $_GET['highlight'] . "/", '$0 * $1', "$string");


The goal, as best I can deduce, is to inject code that overrides/overwrites the original code, such that PHP evaluates the injected pattern as phpinfo() using the /e modifier, but at the same time ignores the rest of the real code, which is harmless.
My thought process involved trying the exit() command with exit(phpinfo()) but then after a couple scores of tries with compilation errors, I am now facepalming and realizing that /* would probably be the right course of action, ignoring the rest of the code, which will not compile due to my tinkering.
