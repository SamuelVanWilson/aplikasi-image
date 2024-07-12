document.addEventListener('DOMContentLoaded', () => {
    console.log('p');
    document.getElementById('banner-select').addEventListener('change', function(){
        const selectedValue = this.value
        console.log(selectedValue)
        document.getElementById('selected-image').src = "http://localhost/aplikasi-image/public/img/" + selectedValue
    })
})