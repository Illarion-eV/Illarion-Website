
check_stat_visibility = function(state, temp_ban_state, temp_jail_state)
{
	
	var temp_ban = document.getElementById('time_settings_'+temp_ban_state);
	var temp_jail = document.getElementById('time_settings_'+temp_jail_state);
	
	if (state ==  temp_ban_state)
	{	
		temp_ban.style.display = 'block';
		temp_jail.style.display = 'none';
	}
	else if (state == temp_jail_state)
	{
		temp_ban.style.display = 'none';
        temp_jail.style.display = 'block';
	}
	else
	{
		temp_ban.style.display = 'none';
        temp_jail.style.display = 'none';
	}

}



