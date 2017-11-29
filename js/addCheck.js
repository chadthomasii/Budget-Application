




$('#check-submit').click(function() 
{
    if(document.getElementById("amount-input").value == "")
    {
        console.log('Nothing');
    }
    else
    {
        var amount = $('#amount-input').val();
        
        document.getElementById("amount-input").value = "";

        $('#modal-content').css('display','none');
    
        $.ajax({
            type: "POST",
            url: './addCheck.php',
            data:
            {
               'amount' : amount
            },
       
            success: function(response)
            {
                

                var json = JSON.parse(response);
                location.reload();
    
                console.log(json);
            }  
        });

    }
       

    
    
});
