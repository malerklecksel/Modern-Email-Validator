<?php

// - - - - - - Modern E-Mail Validator - - - - - - -
//
// From Axel Naegele, South-Germany, 2023 
//
// Validates emails using the latest standards. 
// All new TLDs included.
// 
// If the email address is valid, true is returned.
// - - - - - - - - - - - - - - - - - - - - - - - - -

    function check_email($email)
	{
		if (ctype_graph($email)) 
		{
			
			if (substr_count($email, "@") == 1) 
			{
				$email_check_domain = explode("@", $email); 
				$number_of_dots = substr_count($email_check_domain[1], ".");

				if (strlen($email) <= 255)
				{
					if ($number_of_dots > 0)
					{
						$email_check_domain = $email_check_domain[1];
						$email_check_domain = explode(".", $email_check_domain);
						$i = 0;
						$counter = 0;

						while($i < $number_of_dots)
						{
							if (strlen($email_check_domain[$i]) > 63) {$counter = 1;}
							$i++;
						}

						if ($counter == 0)
						{
							$email_check_correct_characters = $email;

							$search_pattern = "/[@._-]+/";
							$replacement = "";
							$email_cleaned = preg_replace($search_pattern, $replacement, $email_check_correct_characters);

							if (ctype_alnum($email_cleaned))
							{
								return true;
							}
						}
					}
				}
			}
		}
	}
?>