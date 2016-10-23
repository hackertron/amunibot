<?php

function get_puns()
{
$puns = array("what kind of shorts does cloud wear : ThunderWear",
			"I wasn't originally going to get a brain transplant, but then I changed my mind.",
			"I'd tell you a chemistry joke but I know I wouldn't get a reaction",
			"I'm reading a book about anti-gravity. It's impossible to put down.",
			"Why was the toilet paper rolling down the mountain? :To get to the bottom.",
			"I'm glad I know sign language, it's pretty handy.",
			"I think my neighbor is stalking me as she's been googling my name on her computer. I saw it through my telescope last night.",
			"Apparently I snore so loudly that it scares everyone in the car I'm driving.",
			"Telling a girl to calm down works about as well as trying to baptize a cat.",
			"I hate when I am about to hug someone really sexy and my face hits the mirror.",
			"If I wanted to kill myself I'd climb your ego and jump to your IQ.",
			"Once in a bar, one guy said to another.. I slept with your mom last night. after that whole bar was waiting another guy's response. After a while... he laughs and says: Let's go home, Dad, you are drunk....",
			"when you accidentally open the front camera and beauty plus mode is on . .😍
			And then you use 99 filters and write simplicity at its best Girl, at least be scared of God!",
			"If I ever need a heart transplant, I'd want my ex's. It's never been used.");



	$i = rand(0,sizeof($puns));
	echo "$puns[$i]";
	//return $puns[$i]; 
}

get_puns();