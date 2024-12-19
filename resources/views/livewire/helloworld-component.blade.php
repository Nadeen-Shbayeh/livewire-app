<div class="centered-container">
<div>
    <!-- Hello World Section -->
    <h1>{{ $message }}</h1>
    <button wire:click="$set('message', 'Hello from Livewire!')">Change Message</button>

    <!-- Add Product Section -->
    <div>
        <h1>Add New Product</h1>

        <!-- Success Message -->
        @if($successMessage)
            <div class="alert alert-success">{{ $successMessage }}</div>
        @endif

        <!-- Product Form -->
        <form wire:submit.prevent="submit">
            <div class="form-row">
                <div class="form-group">
                    <label for="name">Product Name:</label>
                    <input type="text" wire:model="name" id="name" placeholder="Enter product name">
                    @error('name') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="price">Product Price:</label>
                    <input type="text" wire:model="price" id="price" placeholder="Enter product price">
                    @error('price') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="image">Product Image:</label>
                <button type="button" onclick="document.getElementById('image').click()">Upload</button>
                <input type="file" wire:model="image" id="image" style="display: none;">
                @error('image') <span class="error">{{ $message }}</span> @enderror
            </div>


            <button type="submit">Add Product</button>
        </form>
    </div>

    <!-- Product Table -->
    <div>
        <h2>Product List</h2>
        <!-- Display Product Count -->
        <p>Number of products: {{ count($products) }}</p>
        @if($products && count($products) > 0)
            <table border="1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $index => $product)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $product['name'] }}</td>
                            <td>{{ $product['price'] }}</td>
                            <td>
                                @if ($product['image'])
                                    <img src="{{ $product['image']->temporaryUrl() }}" width="100" />
                                @else
                                    No Image
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No products added yet.</p>
        @endif
    </div>
    </div>

    <style>
         /* Centering the parent container */
    .centered-container {
        display: flex;
        justify-content: center;
        align-items: center;
   
       
    }

    /* Optional styling for the inner div */
    .centered-container > div {
        width: 100%; /* Adjust the width as needed */
        max-width: 80%;
        padding: 20px;
        background-color: white;
    
        border-radius: 8px;
    }
        .error {
            color: red;
            font-size: 0.9em;
        }

        .alert {
            color: green;
            font-size: 1.1em;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 8px 12px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f4f4f4;
        }

        .form-row {
            display: flex;
            gap: 20px;
            margin-bottom: 10px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        .form-group label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            margin-top: 10px;
            padding: 10px 20px;
            background-color:rgb(96, 121, 184);
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 20%;
           
        }

        button:hover {
            background-color:rgb(46, 86, 188);
        }

        
    </style>
</div>
