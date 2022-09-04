
const errorCallback = (error) => {
    console.error(error);
    alert("Please Allow Location");

};

const form = document.querySelector('#login-form');
// console.log(form);
form.addEventListener('submit', e => {

    e.preventDefault();
    navigator.geolocation.getCurrentPosition(async (position) => {
        // const res = await fetch("/api/users/location", {
        //     method: 'POST',
        //     headers: {
        //         'Content-Type': 'application/json'
        //     },
        //     body: JSON.stringify({
        //         latitude: position.coords.latitude,
        //         longitude: position.coords.longitude
        //     })
        // });
        createHiddenInput('longitude', position.coords.longitude)
        createHiddenInput('latitude', position.coords.latitude)

        form.submit();


    }, errorCallback);

})

function createHiddenInput(name, value) {

    const input = document.createElement('input')
    input.name = name
    input.type = 'hidden'
    input.value = value
    form.append(input)
}

