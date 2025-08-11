<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoption Requests - Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <nav class="bg-white shadow-lg fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center"></div>
                    <div>
                        <h1 class="text-xl font-semibold text-gray-900">Rescue The Voiceless</h1>
                        <p class="text-sm text-gray-500">Admin Panel</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="/admin" class="text-gray-600 hover:text-primary transition-colors">Admin Home</a>
                    <a href="/admin/adoption-requests" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-orange-600 transition-colors">Adoption Requests</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="pt-40 pb-12 bg-gradient-to-br from-primary via-orange-400 to-yellow-300">
        <div class="max-w-7xl mx-auto px-4 text-center text-white">
            <h1 class="text-5xl md:text-7xl font-bold mb-6">Adoption Requests</h1>
            <p class="text-xl md:text-2xl mb-8 opacity-90">Review and manage all adoption requests</p>
        </div>
    </div>
    <div class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Requests List</h2>
                <p class="text-xl text-gray-600">All pending and processed adoption requests will appear here.</p>
            </div>
            <!-- Example request card -->
            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-white rounded-xl shadow-lg p-6 text-center">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">John Doe</h3>
                    <p class="text-primary font-semibold mb-4">Request for Bella (Dog)</p>
                    <button class="w-full border border-primary text-primary py-2 px-4 rounded-lg hover:bg-primary hover:text-white transition-colors">Approve</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
