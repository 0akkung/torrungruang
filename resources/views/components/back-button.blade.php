<div>
    <!-- Create a button to go back -->
    <button id="goBackButton" type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">
        {{ $label }}
    </button>

    <!-- Include JavaScript to handle the "go back" action -->
    <script>
        // Add an event listener to the button
        document.getElementById('goBackButton').addEventListener('click', function() {
            // Use the browser's history to go back to the previous page
            window.history.back();
        });
    </script>
</div>
