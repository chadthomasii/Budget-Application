$('#check-submit').click(function() //When button is clicked.
{
    //Check if empty

    if(document.getElementById("name-input").value == "" && document.getElementById("amount-input").value == "")
    {
        console.log('Nothing');
    }
    else
    {
        //Get the vals
        var name = $('#name-input').val();
        var amount = $('#amount-input').val();
        
        document.getElementById("amount-input").value = "";

        $('#modal-content').css('display','none');
    
        $.ajax({
            type: "POST",
            url: './addSavingsPlan.php',
            data:
            {
               'amount' : amount,
               'name' : name
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
