<script>
    var vm = new Vue({
        el: '#app',
        data: {
            datatb: {
                // Tên các cột có thẻ search
                searchcolum: [
                    'name'
                ],
                // đường dẫn đến ajax
                url: '',
                // Số bản ghi trên 1 trang
                length: 10,
                // Biến tìm kiếm
                searchnow: '',
                // Số trang
                total: '',
                // số trang product
                totalProduct: '',
                // Dữ liệu danh sách bảng
                tableData: [],
                // Trang hiện tại đang ở
                paginatenow: 1,
            },
            dataForm: form({
                    @yield('dataForm')
                })
                .rules({
                    name:'required',
                    @yield('rules')
                })
                .messages({
                    'name.required': 'Trường này bắt buộc nhập',
                    @yield('messages')
                })
        },
        methods: {
            async submitForm(){
                if (this.dataForm.validate().errors().any()) {
                    return;
                }
                console.log(this.dataForm.data);
                const response = await axios.post('{{ route('admin.pages.store') }}', this.dataForm.data)
                if(response.data.type = 'success'){
                    console.log(1);
                    // self.success(response.data.message)
                    // self.loadData();
                }else{
                    console.log(2);
                    // self.error(response.data.message);
                }
            }
        }
    })
</script>