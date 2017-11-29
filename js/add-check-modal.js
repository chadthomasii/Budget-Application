//Get the Modal element
var modal = document.getElementById('modal');

//get the open modal button
var modal_button = document.getElementById('plus-button');

//Get close button

var close_button = document.getElementById('close-button');

//Listen for open click
modal_button.addEventListener('click', openModal);

//Listen for close click
close_button.addEventListener('click', closeModal);

//Outside Window Click
window.addEventListener('click', clickOutside);

//Open the Modal
function openModal()
{
    modal.style.display = 'block';
}

function closeModal()
{
    modal.style.display = 'none';
}

function clickOutside(e)
{
    if(e.target == modal)
    {
        modal.style.display = 'none';
    }
}

