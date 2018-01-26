
<?php
$opts = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"X-API-Key: 5veKPEVSFVgxN7nK8Q4zQL6JRxwnvT2CmLyPuXrW"
  )
);
    
header('content-type:application:json;charset=utf8');  
header('Access-Control-Allow-Origin:*');  
header('Access-Control-Allow-Methods:POST,GET');  
header('Access-Control-Allow-Headers:x-requested-with,content-type');

$action=$_REQUEST["act"];


if($action!=""){
    if($action=="legislator"){
        $legislator=$_REQUEST["l"];
        if($legislator=="senate"){
            $context = stream_context_create($opts);
            $json_file = file_get_contents('https://api.propublica.org/congress/v1/115/'.$legislator.'/members.json', false, $context);
            //var_dump(json_decode($json_file));
            echo $json_file;
        }
        else if($legislator=="house"){
            $context = stream_context_create($opts);
            $json_file = file_get_contents('https://api.propublica.org/congress/v1/115/'.$legislator.'/members.json', false, $context);
            //var_dump(json_decode($json_file));
            echo $json_file;
        }
        $member_id=$_REQUEST["id"];
        if($member_id!=""){
            $context = stream_context_create($opts);
            $json_file = file_get_contents('https://api.propublica.org/congress/v1/members/'.$member_id.'.json', false, $context);
            //var_dump(json_decode($json_file));
            echo $json_file;
        }
    }
    else if($action=="bill"){
        $bill=$_REQUEST["b"];
        if($bill=="active"){
            $context = stream_context_create($opts);
            $json_file = file_get_contents('https://api.propublica.org/congress/v1/115/both/bills/active.json', false, $context);
            //var_dump(json_decode($json_file));
            echo $json_file;
        }
        else if($bill=="new"){
            $context = stream_context_create($opts);
            $json_file = file_get_contents('https://api.propublica.org/congress/v1/115/both/bills/introduced.json', false, $context);
            //var_dump(json_decode($json_file));
            echo $json_file;
        }
    }
    else if($action=="vote"){
        $vote=$_REQUEST["v"];
        if($vote=="recent"){
            $context = stream_context_create($opts);
            $json_file = file_get_contents('https://api.propublica.org/congress/v1/house/votes/recent.json', false, $context);
            //var_dump(json_decode($json_file));
            echo $json_file;
        }
        else if($vote=="missed"){
            $context = stream_context_create($opts);
            $json_file = file_get_contents('https://api.propublica.org/congress/v1/115/house/votes/missed.json', false, $context);
            //var_dump(json_decode($json_file));
            echo $json_file;
        }
        else if($vote=="party"){
            $context = stream_context_create($opts);
            $json_file = file_get_contents('https://api.propublica.org/congress/v1/115/house/votes/party.json', false, $context);
            //var_dump(json_decode($json_file));
            echo $json_file;
        }
    }
}







/* Sends an http request to www.example.com
   with additional headers shown above */
//$fp = fopen('https://api.propublica.org/congress/v1/115/senate/members.json', 'r', false, $context);
//fpassthru($fp);
//fclose($fp);
?>
