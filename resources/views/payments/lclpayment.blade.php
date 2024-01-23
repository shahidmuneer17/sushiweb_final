<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Payment</title>
</head>
<body>
    {{$data}}
    {{$seal}}

    <iframe src="https://sherlocks-payment-webinit-simu.secure.lcl.fr/paymentInit/" width="800" height="600"></iframe>

<form action="https://sherlocks-payment-webinit.secure.lcl.fr/paymentInit/" method="POST" id="payment-form">
    @csrf
    <input type="hidden" name="data" value="{{ $data }}">
    <input type="hidden" name="seal" value="{{ $seal }}">
    <input type="submit" value="Pay">
</form>

<form method="post" action="https://sherlocks-payment-webinit.secure.lcl.fr/rs-services/v2/paymentInit/">
    @csrf
    <input type="hidden" name="Data" value="{{ $data }}">
    <input type="hidden" name="InterfaceVersion" value="HP_3.0">
    <input type="hidden" name="Seal" value="{{ $seal }}">
    <input type="submit" value="Payer">
</form>

<form id="myForm">
    @csrf
    <input type="hidden" name="Data" value="{{ $data }}">
    <input type="hidden" name="InterfaceVersion" value="HP_2.18">
    <input type="hidden" name="Seal" value="{{ $seal }}">
    <input type="submit" value="Payer">
</form>

<script>
document.getElementById('myForm').addEventListener('submit', function(e) {
    e.preventDefault();

    var data = {
        Data: e.target.elements.Data.value,
        InterfaceVersion: e.target.elements.InterfaceVersion.value,
        Seal: e.target.elements.Seal.value
    };

    fetch('https://sherlocks-payment-webinit.secure.lcl.fr/paymentInit/', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'mode': 'no-cors'
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(data => console.log(data))
    .catch((error) => {
      console.error('Error:', error);
    });
});
</script>

<!-- <script>
// Fetch the CSRF token from the page's meta tag
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

// Replace these values with your actual credentials
const merchantId = '085323798000018';
const secretKey = 'RLiMKQSZBYa2JyuAlHr-TWpttVRgrw_VhgwzutTL3hw';

// Payment request data
const data = {
    amount: '1000',
    automaticResponseUrl: 'https://responseurl.com/',
    currencyCode: '978',
    interfaceVersion: 'IR_WS_2.22',
    keyVersion: '3',
    merchantId: merchantId,
    normalReturnUrl: 'https://responseurl2.com/',
    orderChannel: 'INTERNET',
    transactionReference: '1232015021717313'
};

// Sort data by field names in alphabetical order
const sortedData = {};
Object.keys(data).sort().forEach(key => {
    sortedData[key] = data[key];
});
const values = Object.values(sortedData);

// Join the values into a single string
const concatenatedString = values.join('');

console.log('Concatenated String:', concatenatedString);
// Convert data to JSON format
const jsonData = JSON.stringify(sortedData);
console.log('Payment Request Data:', jsonData);
// Calculate the Seal using HMAC-SHA256
const encoder = new TextEncoder();
const dataUint8Array = encoder.encode(concatenatedString);
const secretKeyUint8Array = encoder.encode(secretKey);
crypto.subtle.importKey('raw', secretKeyUint8Array, { name: 'HMAC', hash: 'SHA-256' }, false, ['sign']).then(key => {
    return crypto.subtle.sign('HMAC', key, dataUint8Array);
}).then(signature => {
    const seal = Array.from(new Uint8Array(signature), byte => ('0' + (byte & 0xFF).toString(16)).slice(-2)).join('');
    // Add the Seal to the data
    data.seal = seal;
    console.log('Seal:', seal);
    console.log('Payment Request:', data);
    // Send the payment request to your Laravel backend (server-side proxy)
    fetch('/process-payment', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken // Include the CSRF token in the headers
        },
        body: JSON.stringify(data)
    })
    .then(response => {
        if (response.ok) {
            return response.json();
        } else {
            throw new Error('Payment Request Failed. Status: ' + response.status);
        }
    })
    .then(responseData => {
        console.log('Payment Response:', responseData);
    })
    .catch(error => {
        console.error('Error:', error);
    });
});


</script> -->

</body>
</html>