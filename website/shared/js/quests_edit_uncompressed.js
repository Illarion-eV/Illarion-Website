	function disableDatepicker()
	{
		var obj_tba    = document.forms.quest_form.elements.tba;
		var obj_month  = document.forms.quest_form.elements.time_m;
		var obj_year   = document.forms.quest_form.elements.time_y;
		var obj_day    = document.forms.quest_form.elements.time_d;
		var obj_hour   = document.forms.quest_form.elements.time_h;
		var obj_minute = document.forms.quest_form.elements.time_i;
		if(obj_tba.checked)
		{
			obj_month.disabled = true;
			obj_year.disabled = true;
			obj_day.disabled = true;
			obj_hour.disabled = true;
			obj_minute.disabled = true;
			obj_month.className = 'disabled';
			obj_year.className = 'disabled';
			obj_day.className = 'disabled';
			obj_hour.className = 'disabled';
			obj_minute.className = 'disabled';
		}
		else
		{
			obj_month.disabled = false;
			obj_year.disabled = false;
			obj_day.disabled = false;
			obj_hour.disabled = false;
			obj_minute.disabled = false;
			obj_month.className = '';
			obj_year.className = '';
			obj_day.className = '';
			obj_hour.className = '';
			obj_minute.className = '';
		}
	}

	function checkDays()
	{
		var obj_month = document.forms.quest_form.elements.time_m;
		var obj_year  = document.forms.quest_form.elements.time_y;
		var obj_day   = document.forms.quest_form.elements.time_d;
		if(obj_month.selectedIndex == 1)
		{
			obj_day.options[29] = null;
			obj_day.options[29] = null;
			STag = 0;
			j = obj_year.value
			if (j % 400 == 0)
			{
				STag = 1;
			}
			else if (j % 100 == 0)
			{
			   STag = 0;
			}
			else if (j % 4 == 0)
			{
			   STag = 1;
			}
			else
			{
			   sTag = 0;
			}
			if(STag == 1)
			{
			   obj_day.options[28] = new Option("29", "29", false, 0);
			}
			else
			{
				obj_day.options[28] = null;
			}
		}
		else
		{
        	if(obj_day.options[28] == null)
        	{
        		obj_day.options[28] = new Option("29", "29", false, 0);
        	}
        	if(obj_day.options[29] == null)
        	{
        		obj_day.options[29] = new Option("30", "30", false, 0);
        	}
         monat = obj_month.selectedIndex + 1;
         gmonth = monat%2;
         if((gmonth != 0 && monat < 8)||(gmonth==0 && monat > 7))
         {
				obj_day.options[30] = new Option("31", "31", false, 0);
         }
         else
         {
				obj_day.options[30] = null;
        	}
		}
	}