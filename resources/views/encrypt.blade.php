<!-- This page is created using tailwing css -->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#0ed3cf">
    <title>Encryption</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>

</head>

<body class="bg-gray-800" cz-shortcut-listen="true">
    
<div class="" style="">
    <div class="bg-white">
        <div class="mx-auto max-w-7xl px-4 py-24 sm:px-6 sm:py-32 lg:px-8">
        <div class="mx-auto max-w-2xl">
            <form>
                    <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-12">
                
                        <div class="mt-5 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-4">
                            <label for="text" class="block text-sm font-medium leading-6 text-gray-900">TEXT</label>
                            <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" name="text" id="text" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" >
                            </div>
                            </div>
                        </div>
                
                        <div class="col-span-full">
                            <label for="result" class="block text-sm font-medium leading-6 text-gray-900">RESULT</label>
                            <div class="mt-2 flex">
                              <textarea id="result" name="result" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                              <button id="copy-result" type="button" class="ml-2 py-1.5 px-2 rounded-md bg-indigo-600 text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Copy</button>
                            </div>
                        </div>                          
                    </div>
                    </div>
                    <fieldset>
                        <legend class="text-sm font-semibold leading-6 text-gray-900">TYPE</legend>
                        <div class="mt-6 space-y-6">
                          <div class="flex items-center gap-x-3">
                            <input id="encrypt" name="type" value='encrypt' type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                            <label for="encrypt" class="block text-sm font-medium leading-6 text-gray-900">Encrypt</label>
                          </div>
                          <div class="flex items-center gap-x-3">
                            <input id="decrypt" name="type" value='decrypt' type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                            <label for="decrypt" class="block text-sm font-medium leading-6 text-gray-900">Decrypt</label>
                          </div>
                        </div>
                      </fieldset>

                    </div>
                
                    <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Send</button>
                    </div>
            </form>
        </div>
        </div>
    </div>
    <script>
        const copyButton = document.getElementById('copy-result');
        const resultField = document.getElementById('result');
      
        copyButton.addEventListener('click', () => {
          navigator.clipboard.writeText(resultField.value)
            .then(() => {
              alert('Result copied to clipboard');
            })
            .catch((error) => {
              console.error(error);
            });
        });
      </script>
      
    <script>
        document.querySelector('form').addEventListener('submit', function (e) {
        e.preventDefault();
        const inputText = document.getElementById('text').value;
        const type = document.querySelector('input[name="type"]:checked').value;
        let output;

        if (type === 'encrypt') {
            output = CryptoJS.AES.encrypt(inputText, 'secret-key').toString();
        } else {
            output = CryptoJS.AES.decrypt(inputText, 'secret-key').toString(CryptoJS.enc.Utf8);
        }

        document.getElementById('result').value = output;
        });
    </script>    
</body>


</html>