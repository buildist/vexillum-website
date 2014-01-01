var loginbutton, loginfields, progressbar, progress;
jQuery.noConflict();

function showProgressBar()
{
	progressbar.css('display', 'block');
}
function hideProgressBar()
{
	progressbar.css('display', 'none');
}
function setProgress(t)
{
	if(t == null)
		hideProgressBar();
	else
	{
		showProgressBar();
		progress.html(t);
	}
}

window.onload = function()
{
	loginbutton = jQuery('#loginbutton');
	loginfields = jQuery('#loginfields');
	progressbar = jQuery('#progressbar');
	progress = jQuery('#progress');
	if(loginbutton)
	{
		loginbutton.click(function()
		{
			if(loginfields.css('display') == "none")
			{
				loginfields.css('display', 'inline-block');
				return false;
			}
			else
			{
				setProgress('Logging in...');
				var username = encodeURIComponent(jQuery('#username').val());
				var password = encodeURIComponent(jQuery('#password').val());
				jQuery.get('/ajax/login.php?user='+username+'&pass='+password, function(data) {
					var result = parseInt(data);
					if(result == 1)
					{
						jQuery.post('/forum/member.php', 'action=do_login&remember=yes&url='+encodeURIComponent(window.location.href)+'&username='+username+'&password='+password, function()
						{
							location.reload(true);
							setProgress();
						});
					}
					else
					{
						setProgress();
						alert('Incorrect username or password.');
					}
				});
			}
			return false;
		});
	}
}