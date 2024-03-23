<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{env('APP_NAME')}}</title>
    <link rel="stylesheet" href="{{ asset('admin_assets/build/css/tailwindcss.min.css').'?v='.config('app.vesion') ?? '1.0.0' }}">
    <script src="{{ asset('admin_assets/js/vue2.min.js').'?v='.config('app.vesion') ?? '1.0.0' }}"></script>
    <script src="{{ asset('admin_assets/js/vuejs-form.min.js').'?v='.config('app.vesion') ?? '1.0.0' }}"></script>
    <script src="{{ asset('admin_assets/js/axios.min.js').'?v='.config('app.vesion') ?? '1.0.0' }}"></script>
</head>
<body>
    <section id="app" class="bg-gray-50 dark:bg-gray-900" style="background:url({{env('APP_URL').'/admin_assets/images/sky-background-ppt.jpg'}}) no-repeat;background-size: cover;">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white text-center">
                        Đăng nhập
                    </h1>
                    <form @submit.prevent="login" class="space-y-4 md:space-y-6" action="#">
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input v-model="dataForm.name" name="email" id="email" class="focus:outline-none bg-gray-50 border border-gray-300 text-gray-900 focus:border-blue-500 focus:border-2 sm:text-sm rounded-lg block w-full p-2" placeholder="name@company.com">
                            <span class="mt-4 mb-2 text-red-500" v-if="dataForm.errors().has('name')">
                                @{{ dataForm.errors().get('name') }}
                            </span>
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input v-model="dataForm.password" type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 focus:border-2 focus:outline-none border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:border-blue-500 block w-full p-2">
                            <span class="mt-4 mb-2 text-red-500" v-if="dataForm.errors().has('password')">
                                @{{ dataForm.errors().get('password') }}
                            </span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input v-model="dataForm.remember" id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-500 dark dark:ring-offset-gray-800">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                                </div>
                            </div>
                        </div>
                        <button @click="login()" type="submit" class="w-full text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2 text-center">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script>
        new Vue({
            el: '#app',
            data: {
                url:'{{route('admin.setLogin')}}',
                dataForm: form({
                    name: '',
                    password: '',
                    remember:0,
                })
                .rules({
                    name: 'required',
                    password: 'required',
                })
                .messages({
                    'name.required': 'Trường bắt buộc nhập',
                    'password.required': 'Trường bắt buộc nhập',
                }),
            },
            watch: {
            },
            methods:{
                async login(){
                    if (this.dataForm.validate().errors().any()) {
                        return;
                    }
                    console.log(1);
                    const response = axios.post(this.url, this.dataForm.data)
                    console.log(response.data);
                }
            }
        });
    </script>
</body>
</html>