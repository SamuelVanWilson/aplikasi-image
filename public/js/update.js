document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('banner-select').addEventListener('change', function(){
        const selectedValue = this.value
        document.getElementById('selected-image').src = "http://localhost/aplikasi-image/public/img/" + selectedValue
    })
})