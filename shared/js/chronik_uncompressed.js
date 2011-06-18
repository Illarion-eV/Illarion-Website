check_visibility = function()
{
	var time_illa = document.getElementById( 'time_illa' );

	var selectArea_illa = document.getElementById( 'time_select_illa' );
	var selectArea_rl = document.getElementById( 'time_select_rl' );

	if (time_illa.checked)
	{
		selectArea_illa.style.display = 'block';
		selectArea_rl.style.display = 'none';
	}
	else
	{
		selectArea_rl.style.display = 'block';
		selectArea_illa.style.display = 'none';
	}
}

change_month_illa = function()
{
	var day = document.getElementById( 'time_illa_day' );
	var month = document.getElementById( 'time_illa_month' );
	if ( ( month.selectedIndex == 15 ) && ( day.length == 24 ) )
	{
		for ( var i = 5; i < 24; i++ )
		{
			day[5] = null;
		};
	}
	else if ( ( month.selectedIndex != 15 ) && ( day.length < 24 ) )
	{
		for ( var i = 5; i < 24; i++ )
		{
			day[i] = new Option( (i + 1)+".", (i + 1) );
		};
	};
};

change_date_rl = function()
{
	var day = document.getElementById( 'time_rl_day' );
	var month = document.getElementById( 'time_rl_month' );
	var year = document.getElementById( 'time_rl_year' );
	var long_month = ( month.selectedIndex == 0 ) ||
						  ( month.selectedIndex == 2 ) ||
						  ( month.selectedIndex == 4 ) ||
						  ( month.selectedIndex == 6 ) ||
						  ( month.selectedIndex == 7 ) ||
						  ( month.selectedIndex == 9 ) ||
						  ( month.selectedIndex == 11 );
   if ( long_month && ( day.length != 31 ) )
	{
		while( day.length != 31 )
		{
			day[ day.length ] = new Option( (day.length+1)+'.',(day.length+1) );
		}
	}
	else if ( month.selectedIndex == 1 )
	{
		var SJahr = ( year.value%4 == 0 ) && ( ( year.value%100 != 0 ) || ( year.value%400 == 0 ) );
		if (SJahr && day.length != 29)
		{
			if (day.length > 29)
			{
				while( day.length != 29 )
				{
					day[29] = null;
				}
			}
			else
			{
				while( day.length != 29 )
				{
					day[ day.length ] = new Option( (day.length+1)+'.',(day.length+1) );
				}
			}
		}
		else if (day.length != 28)
		{
			if (day.length > 28)
			{
				while( day.length != 28 )
				{
					day[28] = null;
				}
			}
			else
			{
				while( day.length != 28 )
				{
					day[ day.length ] = new Option( (day.length+1)+'.',(day.length+1) );
				}
			}
		}
	}
	else if (day.length != 30)
	{
		if (day.length > 30)
		{
			while( day.length != 30 )
			{
				day[30] = null;
			}
		}
		else
		{
			while( day.length != 30 )
			{
				day[ day.length ] = new Option( (day.length+1)+'.',(day.length+1) );
			}
		}
	}
}

window.onload = function(){check_visibility();change_month_illa();change_date_rl();};