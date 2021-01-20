// <script src="../Scripts/telechargerImage.js"></script>

function aperçu_image(event)
{
    var reader = new FileReader();
    reader.onload = function()
    {
        var output = document.getElementById('sortir_image');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}


