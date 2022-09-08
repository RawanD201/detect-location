const errorCallback = (error) => {
    console.error(error);
    alert('Please Allow Location');
};

window.submitForm = (e) => {
    const form = e.target;
    navigator.geolocation.getCurrentPosition(async (position) => {
        createHiddenInput(form, 'longitude', position.coords.longitude);
        createHiddenInput(form, 'latitude', position.coords.latitude);
        console.log(form)
        form.submit();
    }, errorCallback);
}

function createHiddenInput(form, name, value) {
    const input = document.createElement('input');
    input.name = name;
    input.type = 'hidden';
    input.value = value;
    form.append(input);
}
