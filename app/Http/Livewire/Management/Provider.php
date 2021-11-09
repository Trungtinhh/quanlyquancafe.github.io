<?php

namespace App\Http\Livewire\Management;

use Livewire\Component;
use App\Models\Provider as Pro;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Provider extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $provider_name, $phone, $email, $address, $image, $relationship, $provider_edit, $filter, $providerFilter;
    public $statusEditProvider = false;
    public $statusFilter = false;
    // public $rules = [
    //     'provider_name' => 'required',
    //     'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9|unique:providers,phone',
    //     'email' => 'required|email|unique:providers,email',
    //     'address' => 'required',
    //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //     'relationship' => 'required',
    // ];
    public $messages = [
        'provider_name.required' => 'Tên nhà cung cấp không được bỏ trống',
        'phone.required' => 'Số điện thoại không được bỏ trống',
        'phone.regex' => 'Số điện thoại không hợp lệ',
        'phone.min' => 'Số điện thoại chỉ 10 chữ số',
        'phone.unique' => 'Số điện thoại đã có',
        'email.required' => 'Email không được bỏ trống',
        'email.email' => 'Email không hợp lệ',
        'email.unique' => 'Email đã có',
        'address.required' => 'Đại chỉ không được bỏ trống',
        'image.required' => 'Vui lòng chọn ảnh',
        'image.image' => 'Tệp tải lên không phải hình ảnh',
        'image.mimes' => 'Định dạng không hỗ trợ',
        'image.max' => 'Ảnh quá lớn',
        'relationship.required' => 'Quan hệ không được bỏ trống',

    ];
    public function render()
    {
        return view('livewire.management.provider', ['provider' => Pro::paginate(10)]);
    }
    public function mount()
    {
        $this->provider_name = '';
        $this->phone = '';
        $this->email = '';
        $this->address = '';
        $this->image = '';
        $this->relationship = '';
        $this->provider_edit = '';
    }
    public function resetAll()
    {
        $this->resetValidation();
        $this->statusEditProvider = false;
        $this->provider_name = '';
        $this->phone = '';
        $this->email = '';
        $this->address = '';
        $this->image = '';
        $this->relationship = '';
        $this->provider_edit = '';
    }
    public function addProvider()
    {
        $this->validate([
            'provider_name' => 'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9|unique:providers,phone',
            'email' => 'required|email|unique:providers,email',
            'address' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'relationship' => 'required',
        ]);
        Pro::create([
            'provider_name' => $this->provider_name,
            'phone' => $this->phone,
            'email' => $this->email,
            'address' => $this->address,
            'image' => $this->image->store('images', 'public'),
            'relationship' => $this->relationship,
        ]);
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Đã thêm!"
        ]);
    }
    public function deleteProvider($provider_id)
    {
        Pro::where('id', $provider_id)->delete();
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Đã xóa!"
        ]);
    }
    public function editProvider(Pro $provider)
    {
        $this->resetValidation();
        $this->statusEditProvider = true;
        $this->provider_edit = $provider->toArray();
        $this->provider_name = $this->provider_edit['provider_name'];
        $this->phone = $this->provider_edit['phone'];
        $this->email = $this->provider_edit['email'];
        $this->address = $this->provider_edit['address'];
        $this->relationship = $this->provider_edit['relationship'];
        $this->image = '';
        $this->dispatchBrowserEvent('show-edit');
        //dd($this->provider_edit);
    }
    public function storeEdit()
    {
        $this->validate([
            'provider_name' => 'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9|unique:providers,phone,' . $this->provider_edit["id"],
            'email' => 'required|email|unique:providers,email,' . $this->provider_edit["id"],
            'address' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'relationship' => 'required',
        ]);
        Pro::where('id', $this->provider_edit["id"])->update([
            'provider_name' => $this->provider_name,
            'phone' => $this->phone,
            'email' => $this->email,
            'address' => $this->address,
            'image' => $this->image->store('images', 'public'),
            'relationship' => $this->relationship,
        ]);
        $this->resetAll();
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Sửa thành công!"
        ]);
    }
    public function filter()
    {
        if (!empty($this->filter)) {
            $this->statusFilter = true;
            $this->providerFilter = Pro::where('relationship', $this->filter)->get();
        }
    }
    public function closeFilter()
    {
        $this->statusFilter = false;
    }
}
