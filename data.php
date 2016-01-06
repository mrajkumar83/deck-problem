<?php
header("Access-Control-Allow-Origin: *");//For Cross Domain
header("Content-Type: application/json; charset=UTF-8");//JSON Header
$json_data ='[
	{
		"id": "Tenrox-R1_1235",
		"owner": "",
		"startDate": "",
		"startTime": "",
		"statics": {"state" : "Pending", "metrics": [0, ""], "build": [0, ""],"unitTest": [0, ""],"functionalTest": [0, ""]},
		"metrics": {},
		"build": {},
		"unitTest": {},
		"functionalTest": {}
	},
	{
		"id": "432462",
		"owner": "jtuck",
		"startDate": "4/18/2014",
		"startTime": "12:12pm",
		"statics": {"state" : "Running", "metrics": [50, "Running"], "build": [0, ""],"unitTest": [0, ""],"functionalTest": [0, ""]},
		"metrics": {},
		"build": {},
		"unitTest": {},
		"functionalTest": {}
	},
	{
		"id": "432461",
		"owner": "samy",
		"startDate": "4/18/2014",
		"startTime": "10:53am",
		"statics": {"state" : "Rejected", "metrics": [100, "Rejected"], "build": [100, "Completed"],"unitTest": [100, "Completed"],"functionalTest": [100, "Completed"]},
		"metrics": {"testScore": "64", "maintainScore":"53","workmanScore":"72", "securityScore":"64"},
		"build": {"startTime":"10:46am", "startDate": "4/17/2014"},
		"unitTest": {"testPass": "73", "codeCover": "76", "passResults": "142", "failResults":"10"},
		"functionalTest": {"testPass": "73", "codeCover": "76", "passResults": "142", "failResults":"10"}
	},
	{
		"id": "Tenrox-R1_1235",
		"owner": "",
		"startDate": "4/17/2014",
		"startTime": "9:42am",
		"statics": {"state" : "Completed", "metrics": [100, "Completed"], "build": [100, "Completed"],"unitTest": [100, "Completed"],"functionalTest": [100, "Completed"]},
		"metrics": {"testScore": "54", "maintainScore":"63","workmanScore":"82", "securityScore":"24"},
		"build": {"startTime":"10:46am", "startDate": "4/17/2014"},
		"unitTest": {"testPass": "83", "codeCover": "76", "passResults": "143", "failResults":"20"},
		"functionalTest": {"testPass": "73", "codeCover": "86", "passResults": "142", "failResults":"10"}
	},
	{
		"id": "432460",
		"owner": "samy",
		"startDate": "4/17/2014",
		"startTime": "7:51am",
		"statics": {"state" : "Rejected", "metrics": [100, "Rejected"], "build": [0, ""],"unitTest": [0, ""],"functionalTest": [0, ""]},
		"metrics": {"testScore": "64", "maintainScore":"53","workmanScore":"72", "securityScore":"64"},
		"build": {"startTime":"10:53am", "startDate": "4/17/2014"},
		"unitTest": {"testPass": "43", "codeCover": "56", "passResults": "144", "failResults":"30"},
		"functionalTest": {"testPass": "53", "codeCover": "66", "passResults": "142", "failResults":"10"}
	},
	{
		"id": "432459",
		"owner": "samy",
		"startDate": "4/16/2014",
		"startTime": "6:43am",
		"statics": {"state" : "Accepted", "metrics": [100, "Completed"], "build": [100, "Completed"],"unitTest": [100, "Completed"],"functionalTest": [100, "Completed"]},
		"metrics": {"testScore": "54", "maintainScore":"63","workmanScore":"82", "securityScore":"24"},
		"build": {"startTime":"7:46am", "startDate": "4/16/2014"},
		"unitTest": {"testPass": "83", "codeCover": "76", "passResults": "145", "failResults":"40"},
		"functionalTest": {"testPass": "73", "codeCover": "86", "passResults": "142", "failResults":"10"}
	}]';
echo($json_data);
?>