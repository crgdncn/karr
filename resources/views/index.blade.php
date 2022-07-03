<html>
<head>
    @vite(['resources/js/app.js'])

    <script>
        const listOrders = function () {
            const formData = new FormData(document.getElementById('form'));
            const payload = {
                vehicle_id: formData.get('vehicle') ? formData.get('vehicle').valueOf() : '',
                key_id: formData.get('key') ? formData.get('key').valueOf() : '',
                technician_id: formData.get('technician') ? formData.get('technician').valueOf() : '',
            }

            const queryString = new URLSearchParams(payload).toString()
            axios.get('/api/orders?' + queryString).then(
                (response) => {
                    const element = document.getElementById("pre");
                    element.innerHTML = JSON.stringify(response.data, undefined, 2);
                }
            ).catch( (error) => {
                const element = document.getElementById("pre");
                element.innerHTML = JSON.stringify(error, undefined, 2);
            })
        }

        const createOrder = function () {
            const formData = new FormData(document.getElementById('form'));
            const payload = {
                vehicle_id: formData.get('vehicle') ? formData.get('vehicle').valueOf() : null,
                key_id: formData.get('key') ? formData.get('key').valueOf() : null,
                technician_id: formData.get('technician') ? formData.get('technician').valueOf() : null,
            }

            axios.post('/api/orders/', payload).then(
                (response) => {
                    const element = document.getElementById("pre");
                    element.innerHTML = JSON.stringify(response.data, undefined, 2);
                }
            ).catch( (error) => {
                const element = document.getElementById("pre");
                element.innerHTML = JSON.stringify(error, undefined, 2);
            })
        }
    </script>
</head>
<body>
<form id="form">
<table style="width: 600px;">
    <tr>
        <td>Select a Vehicle</td>
        <td>
            <?php $options = $vehicles ?? [1,2,3]; ?>
            <select name="vehicle">
                <option value="" disabled selected>Select</option>
                @foreach($options as $option)
                    <option value="{{$option->id}}">{{ implode(' - ', [$option->year, $option->make, $option->model]) }}</option>
                @endforeach
            </select>
        </td>
    </tr>
    <tr>
        <td>Select a key</td>
        <td>
            <?php $options = $keys; ?>
            <select name="key">
                <option value="" disabled selected>Select</option>
                @foreach($options as $option)
                    <option value="{{$option->id}}">{{ $option->name }}</option>
                @endforeach
            </select>
        </td>
    </tr>
    <tr>
        <td>Select a Technician</td>
        <td>
            <?php $options = $technicians; ?>
            <select name="technician">
                <option value="" disabled selected>Select</option>
                @foreach($options as $option)
                    <option value="{{$option->id}}">{{ $option->first_name . ' ' . $option->last_name }}</option>
                @endforeach
            </select>
        </td>
    </tr>
</table>
</form>

<button onClick="createOrder();">Create Order</button> <button onClick="listOrders();">List Orders</button>

<pre id="pre">
</pre>

</body>
</html>
