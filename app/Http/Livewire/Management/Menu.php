<?php

namespace App\Http\Livewire\Management;

use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\MenuCategory;
use App\Models\Provider;
use App\Models\DrinkDetail;
use App\Models\Drink;
use App\Models\Ingredent;
use App\Models\Price;
use Carbon\Carbon;

class Menu extends Component
{
    use WithFileUploads;
    public $provider, $drink_name, $drink_price, $drink_image, $drink_date_exp, $menu_category_id, $menu_category_name, $type;
    public $provider_name, $phone, $email, $address, $image, $relationship;
    public $drink_menu_category_id, $null_menu_category_name;
    public $noti = '';
    public $drinkDetail, $drinkDetail_1, $statusModalDetail = false;
    public $statusModalEditPrice = false, $drink_edit_name, $edit_price_value;

    protected $messages = [
        'menu_category_name.required' => 'Tên danh mục không được bỏ trống',
        'menu_category_name.unique' => 'Tên danh mục đã có',

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

        'provider.required' => 'Vui lòng chọn nhà cung cấp',
        'drink_name.required' => 'Tên sản phẩm không được bỏ trống',
        'menu_category_id.required' => 'Danh mục sản phẩm không được bỏ trống',
        'drink_price.required' => 'Giá sản phẩm không được bỏ trống',
        'drink_price.min' => 'Giá sản phẩm không được nhỏ hơn 0',
        'drink_image.required' => 'Vui lòng chọn ảnh',
        'drink_image.image' => 'Tệp tải lên không phải hình ảnh',
        'drink_image.mimes' => 'Định dạng không hỗ trợ',
        'drink_image.max' => 'Ảnh quá lớn',
        'drink_date_exp.required' => 'Chọn hạn sử dụng cho sản phẩm',
        'drink_date_exp.after' => 'Hạn sử dụng không hợp lý',
        'type.required' => 'Vui lòng chọn loại sản phẩm',

        'drink_menu_category_id.required' => 'Danh mục sản phẩm không được bỏ trống',
        'null_menu_category_name.required' => 'Vui lòng chọn thức uống',

        'edit_price_value.required' => 'Giá không được bỏ trống',
        'edit_price_value.min' => 'Giá không được nhỏ hơn 0',
    ];
    public function render()
    {
        return view('livewire.management.menu', [
            'Menu_category' => MenuCategory::all(),
            'Drink' => Drink::orderBy('drink_name', 'ASC')->get()->groupBy('drink_name'),
            'DrinkNullMenuCategory' => Drink::where('menu_category_id', null)->get()->groupBy('drink_name'),
            'Pro' => Provider::all(),
            'Ingredent' => Ingredent::all()
        ]);
    }
    public function mount()
    {
        $this->null_menu_category_name = [];
    }
    public function closeAdd()
    {
        $this->resetValidation();
        $this->noti = '';
        $this->null_menu_category_name = [];
    }
    public function addCategory()
    {
        $this->validate([
            'menu_category_name' => 'required|unique:menu_categorys,menu_category_name'
        ]);
        MenuCategory::create([
            'menu_category_name' => $this->menu_category_name,
        ]);
        $this->closeAdd();
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Đã thêm!"
        ]);
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
        Provider::create([
            'provider_name' => $this->provider_name,
            'phone' => $this->phone,
            'email' => $this->email,
            'address' => $this->address,
            'image' => $this->image->store('images', 'public'),
            'relationship' => $this->relationship,
        ]);
        $this->closeAdd();
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Đã thêm!"
        ]);
    }
    public function addMenuCategoryDrink()
    {
        $this->validate([
            'drink_menu_category_id' => 'required',
            'null_menu_category_name' => 'required',
        ]);
        foreach ($this->null_menu_category_name as $value) {
            Drink::where('drink_name', $value)->update([
                'menu_category_id' => $this->drink_menu_category_id,
            ]);
        }
        $this->closeAdd();
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Đã thêm thức uống vào danh mục!"
        ]);
    }
    public function addDrink()
    {
        $this->validate([
            'type' => 'required',
            'drink_name' => 'required',
            'menu_category_id' => 'required',
            'drink_price' => 'required|numeric|min:0',
            'drink_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($this->type == 'co_san') {
            $this->validate([
                'provider' => 'required',
                'drink_date_exp' => 'required|after:' . Carbon::now()->toDateString(),
            ]);
            if (!DrinkDetail::where('drink_name', $this->drink_name)
                ->where('provider_id', $this->provider)->where('date_exp', $this->drink_date_exp)
                ->where('date_exp', $this->drink_date_exp)->exists()) {
                $drink = Drink::create([
                    'drink_name' => $this->drink_name,
                    'category' => 1,
                    'menu_category_id' => $this->menu_category_id
                ]);
                $price = Price::create([
                    'price_cost' => $this->drink_price,
                    'category' => 1
                ]);
                DrinkDetail::create([
                    'drink_id' => $drink->getKey(),
                    'drink_name' => $this->drink_name,
                    'price_id' => $price->getKey(),
                    'provider_id' => $this->provider,
                    'date_exp' =>  $this->drink_date_exp,
                    'image' => $this->drink_image->store('images', 'public'),
                ]);
                $this->dispatchBrowserEvent('alert', [
                    'type' => 'success',
                    'message' => "Đã thêm!"
                ]);
                $this->closeAdd();
            } else {
                $this->noti = 'Sản phẩm hiện đã có!';
            }
        } else {
            if (!DrinkDetail::where('drink_name', $this->drink_name)->exists()) {
                $drink = Drink::create([
                    'drink_name' => $this->drink_name,
                    'category' => 2,
                    'menu_category_id' => $this->menu_category_id
                ]);
                $price = Price::create([
                    'price_cost' => $this->drink_price,
                    'category' => 1
                ]);
                DrinkDetail::create([
                    'drink_id' => $drink->getKey(),
                    'drink_name' => $this->drink_name,
                    'price_id' => $price->getKey(),
                    'image' => $this->drink_image->store('images', 'public'),
                ]);
                $this->dispatchBrowserEvent('alert', [
                    'type' => 'success',
                    'message' => "Đã thêm!"
                ]);
                $this->closeAdd();
            } else {
                $this->noti = 'Sản phẩm hiện đã có!';
            }
        }
    }
    public function deleteMenuCategory($menu_category_id)
    {
        $MenuCategoryDrink = Drink::all();
        foreach ($MenuCategoryDrink as $value) {
            if ($value->menu_category_id == $menu_category_id) {
                Drink::where('drink_id', $value->drink_id)->update([
                    'menu_category_id' => null
                ]);
            }
        }
        MenuCategory::where('menu_category_id', $menu_category_id)->delete();
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Đã xóa danh mục!"
        ]);
    }
    public function deleteMenuCategoryDrink($drink_name)
    {
        Drink::where('drink_name', $drink_name)->update([
            'menu_category_id' => null
        ]);
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Đã xóa thức uống khỏi danh mục!"
        ]);
    }
    public function drinkDetail($drink_name)
    {
        $this->statusModalDetail = true;
        $this->drinkDetail = DrinkDetail::where('drink_name', $drink_name)->get();
        $this->drinkDetail_1 = DrinkDetail::where('drink_name', $drink_name)->get()->toArray();
        $this->dispatchBrowserEvent('show-detail');
    }
    public function showEditPrice($drink_name)
    {
        $this->statusModalEditPrice = true;
        $this->drink_edit_name = $drink_name;
        $this->dispatchBrowserEvent('show-edit-price');
        
        // $this->drinkDetail = DrinkDetail::where('drink_name', $drink_name)->get();
        // foreach ($this->drinkDetail as $vl) {
        //     Price::where('price_id', $vl->price_id)->update
        // }
    }
    public function editPrice($drink_name)
    {    
        $this->validate([
            'edit_price_value' => 'required|numeric|min:0'
        ]);
        $drinkDetail = DrinkDetail::where('drink_name', $drink_name)->get();
        foreach ($drinkDetail as $vl) {
            Price::where('price_id', $vl->price_id)->update([
                'price_cost' => $this->edit_price_value
            ]);
        }
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Đã cập nhật giá!"
        ]);
    }
    public function deleteDrink($drink_name)
    {
        Drink::where('drink_name', $drink_name)->delete();
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Đã xóa thức uống khỏi danh sách!"
        ]);
    }
}
