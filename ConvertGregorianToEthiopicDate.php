class ETBnumToText
{

public function ConvertGregorianToEthiopicDate($gy,$gm,$gd)
	{
		$starts = array(26, 21, 22, 22, 23, 24, 22, 23, 23, 24, 24, 25);


		$ey = ($gm <= 9) ? $gy - 8 : $gy - 7;

		if ($ey % 4 == 0)
			for ($i = 1; $i < 6; $i++)
				$starts[i]--;
		$em = ($gm + 2)%12 + 1;
		$ed = $starts[($gm + 3)%12];
		
		$diff = $gd - 1;
		if($em < 12)
		{
			$ed += $diff;
			if($ed > 30)
			{
				$em++;
				$ed = $ed - 30;
			}
		} 
		else
		{
			$ed += $diff;
			if($ed > 30)
			{
				$excess = $ed - 30;
				if($excess > 5)
				{
					$excess -= (($ey + 1)%4 == 0) ? 5 : 6;
					if($excess > 0)
					{
						$em = 1;
						$ed = $excess;
						$ey++;
					} else
					{
						$ed = (($ey + 1)%4 == 0) ? 6 : 5;
						$em = 13;
					}
				}
			}
		}
		$gdt = strtotime($ey."-".$em."-".$ed);
		return date('d/m/Y', $gdt);
	}
}