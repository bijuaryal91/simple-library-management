const username=document.querySelector('.username'),
password=document.querySelector('.password'),
btnSubmit=document.querySelector('.btn-primary');
var error=document.querySelector('.errorText');
function validate()
{
    if(username.value.length==0 || password.value.length==0)
    {
        error.innerHTML="All Fields Are Required!";
        return false;
    }
    else if(username.value.length<5)
    {
        error.innerHTML="Username must be 5 character long.";
        return false;
    }
    else if(password.value.length<8)
    {
        error.innerHTML="Password must be 8 character long.";
        return false;
    }
    else
    {
        return true;
    }
}