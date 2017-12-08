$(function() 
{ 
    $("#journeydate").datepicker(
        {
            dateFormat: "dd-mm-yy",changeMonth:true,changeYear:true
        });
});
function stationfunc(s1,s2,s3)
{
        var s1=document.getElementById(s1);
        var s2=document.getElementById(s2);
        var s3=document.getElementById(s3);
        s2.innerHTML="";
        s3.innerHTML="";
        if(s1.value=="Bangalore")
        {
            var optionsarr=["|Select To Station:","Chennai|Chennai","Hyderabad|Hyderabad","Kolkata|Kolkata","Mumbai|Mumbai","New Delhi|New Delhi"];
        }
        else if(s1.value=="Chennai")
        {
            var optionsarr=["|Select To Station:","Bangalore|Bangalore","Hyderabad|Hyderabad","Kolkata|Kolkata","Mumbai|Mumbai","New Delhi|New Delhi"];
        }
        else if(s1.value=="Hyderabad")
        {
            var optionsarr=["|Select To Station:","Bangalore|Bangalore","Chennai|Chennai","Kolkata|Kolkata","Mumbai|Mumbai","New Delhi|New Delhi"];
        }
        else if(s1.value=="Kolkata")
        {
            var optionsarr=["|Select To Station:","Bangalore|Bangalore","Chennai|Chennai","Hyderabad|Hyderabad","Mumbai|Mumbai","New Delhi|New Delhi"];
        }
        else if(s1.value=="Mumbai")
        {
            var optionsarr=["|Select To Station:","Bangalore|Bangalore","Chennai|Chennai","Hyderabad|Hyderabad","Kolkata|Kolkata","New Delhi|New Delhi"];
        }
        else if(s1.value=="New Delhi")
        {
            var optionsarr=["|Select To Station:","Bangalore|Bangalore","Chennai|Chennai","Hyderabad|Hyderabad","Kolkata|Kolkata","Mumbai|Mumbai"];
        }
        for(var option in optionsarr)
        {
            var pair=optionsarr[option].split("|");
            var newop=document.createElement("option");
            newop.value=pair[0];
            newop.innerHTML=pair[1];
            s2.options.add(newop);
        }
        if(s1.value == "New Delhi" || s2.value == "New Delhi")
        {
            var optype=["|Select Train Type:","Rajdhani|Rajdhani","Jan Shatabdi|Jan Shatabdi","Express|Express"];
        }
        else if(s1.value != "New Delhi" || s2.value != "New Delhi")
        {
            var optype=["|Select Train Type:","Jan Shatabdi|Jan Shatabdi","Express|Express"];
        }
        else
        {
            var optype=["|Select Train Type:"];
        }
        for(var option in optype)
        {
            var pair2=optype[option].split("|");
            var newop2=document.createElement("option");
            newop2.value=pair2[0];
            newop2.innerHTML=pair2[1];
            s3.options.add(newop2);
        }
}
