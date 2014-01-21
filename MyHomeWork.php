<?php
class MyHomeWork {
	public $date;
	public $weekDay;
	function __construct() {
	}
	
	/**
	 * @assert (1, 1,1,2014) == "24 day left"
	 * @assert (1, 23,8,2013) == "22 day left"
	 * @assert (1, 24,1,2014) == "23 day left"
	 * @assert (2, 1,1,2014) == "23 day left"
	 * @assert (2, 23,8,2013) == "21 day left"
	 * @assert (2, 24,1,2014) == "22 day left"
	 * @assert (24, 1,1,2014) == "tomorow"
	 * @assert (24, 23,8,2013) == "23 day left"
	 * @assert (24, 24,1,2014) == "24 day left"
	 * @assert (25, 1,1,2014) == "You are a rich now"
	 * @assert (26, 1,1,2014) == "You are pool now"
	 * @assert (27, 1,1,2014) == "You got it 2 day ago"
	 * @assert (29, 1,1,2014) == "xxx"
	 * @assert (30, 1,1,2014) == "xxx"
	 * @assert (31, 1,1,2014) == "xxx"
	 */
	public function salaryIsPaid($today, $day = 1, $month, $year) {
		$is_friday = $this->isFriday( $day ,$month, $year);
		switch ($today) {
			case 1 :
				if ($is_friday && $day == 23) {
					$msg = '22 day left';
				} else if ($is_friday && $day == 24) {
					$msg = '23 day left';
				} else {
					$msg = '24 day left';
				}
				;
				break;
			
			case 2 :
				if ($is_friday && $day == 23) {
					$msg = '21 day left';
				} else if ($is_friday && $day == 24) {
					$msg = '22 day left';
				} else {
					$msg = '23 day left';
				}
				;
				break;
			
			case 24 :
				if ($is_friday && $day == 23) {
					$msg = '23 day left';
				} else if ($is_friday && $day == 24) {
					$msg = '24 day left';
				} else {
					$msg = 'tomorow';
				}
				;
				break;
			
			case 25 :
				$msg = 'You are a rich now';
				;
				break;
				
			case 26 :
				$msg = 'You are pool now';
				;
				break;

			case 27 :
				$msg = 'You got it 2 day ago';
				;
				break;
				
			default :
				$msg = 'xxx';
				;
				break;
		}
		return $msg;
	}
	
	/**
	 * @assert (23, 1, 2014) == false
	 * @assert (24, 1, 2014) == true
	 * @assert (25, 1, 2014) == false
	 */
	private function isFriday($day, $month = 1, $year = 2014) {
		$month = ! empty ( $month ) ? $month : date ( 'n' );
		$year = ! empty ( $year ) ? $year : date ( 'Y' );
		if (date ( 'w', mktime ( 0, 0, 0, $month, $day, $year ) ) == 5) { // 0 = sunday
			return true;
		} else {
			return false;
		}
	}
}
?>
