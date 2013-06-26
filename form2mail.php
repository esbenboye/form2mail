<?php

if(isset($_POST["submit"))
{
		$info = $_POST;

		$info["subject"] = isset($info["subject"])?$info["subject"]:"No subject";
		$info["from"] = isset($info["from"])?$info["from"]:ini_get("sendmail_from");
		$info["to"] = isset($info["to"])?$info["to"]:null;

		if(!is_null($info["to"]))
		{
			$to = $info["to"];
			unset($info["to"]);
			
			$subject = $info["subject"];
			unset($info["subject"]);
			
			$send = "";
			foreach($info as $name => $value)
			{
				if(is_array($value))
				{
					// In case multiple-choice like checkbox
					$value = implode(", ",$value);
				}
				$tempString = "$name = $value \r\n";
				$send.=$tempString;
			}
			
			
			
			mail($to, $subject, $send);
		}
		else
		{
			// React to no reciever here...
		}
		
}
?>