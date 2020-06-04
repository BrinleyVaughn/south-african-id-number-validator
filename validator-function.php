<?php
function bluCB1609_verify_id_number($id_number, $return_details = false) {

	$validated = false;

	if (is_numeric($id_number) && strlen($id_number) === 13) {

		$errors = false;

		$num_array = str_split($id_number);


		// Validate the day and month

		$id_month = $num_array[2] . $num_array[3];

		$id_day = $num_array[4] . $num_array[5];


		if ( $id_month < 1 || $id_month > 12) {
			$errors = true;
		}

		if ( $id_day < 1 || $id_day > 31) {
			$errors = true;
		}
		

		// Validate gender

		$id_gender = $num_array[6] >= 5 ? 'male' : 'female';


		// Validate citizenship

		// citizenship as per id number
		$id_foreigner = $num_array[10];


		/**********************************
			Check Digit Verification
		**********************************/

		// Declare the arrays
		$even_digits = array();
		$odd_digits = array();

		// Loop through modified $num_array, storing the keys and their values in the above arrays
		foreach ( $num_array as $index => $digit) {

		    if ($index === 0 || $index % 2 === 0) {

		        $odd_digits[] = $digit;
		       
		    }

		    else {

		        $even_digits[] = $digit;

		    }

		}

		// use array pop to remove the last digit from $odd_digits and store it in $check_digit
		$check_digit = array_pop($odd_digits);

		//All digits in odd positions (excluding the check digit) must be added together.
		$added_odds = array_sum($odd_digits);

		//All digits in even positions must be concatenated to form a 6 digit number.
		$concatenated_evens = implode('', $even_digits);

		//This 6 digit number must then be multiplied by 2.
		$evensx2 = $concatenated_evens * 2;

		// Add all the numbers produced from the even numbers x 2
		$added_evens = array_sum( str_split($evensx2) );

		$sum = $added_odds + $added_evens;

		// get the last digit of the $sum
		$last_digit = substr($sum, -1);

		// 10 - $last_digit
		$verify_check_digit = 10 - (int)$last_digit;

		// test expected last digit against the last digit in $id_number submitted
		if ((int)$verify_check_digit !== (int)$check_digit) {
			$errors = true;
		}

		// if errors haven't been set to true by any one of the checks, we can change verified to true;
		if (!$errors) {
			$validated = true;
		}

	}

    if ($return_details === false) {
	    return $validated;
    }
    
    else {

        $citizen_status = !$id_foreigner ? 'YES' : 'NO';

        $birth_year = substr($id_number, 0, 2);
        $birth_month = substr($id_number, 2, 4);
        $year = date('y');
        $month = date('m');
        
        $age = $year < $birth_year ? ($year - $birth_year) + 100 : $year - $birth_year ;
        
        $age =  $month < $birth_month ? $age - 1 : $age;
        
        echo '<div class="id-holder-details">
            <table>
                <tr>
                    <th>Age</th>
                    <td>' . esc_textarea($age) . '</td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td>' . strtoupper(esc_textarea( $id_gender) ). '</td>
                </tr>
                <tr>
                    <th>Citizen</th>
                    <td>' . esc_textarea($citizen_status) .'</td>
                </tr>
            </table>
        </div>';
    }


}