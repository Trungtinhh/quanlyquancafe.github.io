<?php

namespace App\Http\Livewire\Management;

use Livewire\Component;
use App\Models\Provider;
use App\Models\Drink;
use App\Models\DrinkDetail;
use App\Models\Ingredent;
use App\Models\IngredentDetail;

use Livewire\WithFileUploads;
use App\Models\Price;
use App\Models\ImportgoodsDrink;
use App\Models\ImportgoodsIngredent;
use App\Models\MenuCategory;

class Import extends Component
{
    use WithFileUploads;
    public $category, $product, $price, $amount_add, $date_add, $date_exp, $provider;
    public $provider_name, $phone, $email, $address, $image, $relationship;
    public $product_name, $product_price, $product_image, $product_date_exp, $menu_category_id, $menu_category_name;
    public $noti = '';
    // protected $rules = [
    //     'category' => 'required',
    //     'product_name' => 'required',
    //     'price' => 'required',
    //     'amount_add' => 'required',
    //     'date_add' => 'required',
    //     'date_exp' => 'required|after:date_add',
    //     'provider' => 'required'
    // ];

    protected $messages = [
        'category.required' => 'Vui lòng chọn danh mục',
        'product.required' => 'Tên không được bỏ trống',
        'price.required' => 'Giá không được bỏ trống',
        'amount_add.required' => 'Số lượng không được bỏ trống',
        'date_add.required' => 'Ngày nhập kho không được bỏ trống',
        'date_exp.required' => 'Hạn sử dụng không được bỏ trống',
        'date_exp.after' => 'Hạn sử dụng không hợp lý',
        'provider.required' => 'Nhà cung cấp không được bỏ trống',

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

        'product_name.required' => 'Tên sản phẩm không được bỏ trống',
        'menu_category_id.required' => 'Danh mục sản phẩm không được bỏ trống',
        'product_price.required' => 'Giá sản phẩm không được bỏ trống',
        'product_image.required' => 'Vui lòng chọn ảnh',
        'product_image.image' => 'Tệp tải lên không phải hình ảnh',
        'product_image.mimes' => 'Định dạng không hỗ trợ',
        'product_image.max' => 'Ảnh quá lớn',
        'product_date_exp.required' => 'Chọn hạn sử dụng cho sản phẩm',

        'menu_category_name.required' => 'Tên danh mục không được bỏ trống',
        'menu_category_name.unique' => 'Danh mục đã có sẵn'
    ];
    public function render()
    {
        return view('livewire.management.import', [
            'Pro' => Provider::all(),
            'Drink' => DrinkDetail::where('provider_id', $this->provider)->get()->groupBy('drink_name')->toArray(),
            'Ingredent' => IngredentDetail::where('provider_id', $this->provider)->get()->groupBy('ingredent_name')->toArray(),
            'Menu_category' => MenuCategory::all(),
        ]);
    }
    public function closeAdd()
    {
        $this->resetValidation();
        $this->noti = '';
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
    public function addProduct()
    {
        if ($this->category == 1) {
            $this->validate([
                'product_name' => 'required',
                'menu_category_id' => 'required',
                'product_price' => 'required',
                'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'product_date_exp' => 'required',
            ]);
            if (!DrinkDetail::where('drink_name', $this->product_name)
                ->where('provider_id', $this->provider)->where('date_exp', $this->product_date_exp)
                ->where('date_exp', $this->product_date_exp)->exists()) {
                $drink = Drink::create([
                    'drink_name' => $this->product_name,
                    'category' => 1,
                    'menu_category_id' => $this->menu_category_id,
                ]);
                $price = Price::create([
                    'price_cost' => $this->product_price,
                    'category' => 1
                ]);
                DrinkDetail::create([
                    'drink_id' => $drink->getKey(),
                    'drink_name' => $this->product_name,
                    'price_id' => $price->getKey(),
                    'provider_id' => $this->provider,
                    'date_exp' =>  $this->product_date_exp,
                    'image' => $this->product_image
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
            $this->validate([
                'product_name' => 'required',
                'product_price' => 'required',
                'product_date_exp' => 'required',
            ]);
            if (!IngredentDetail::where('ingredent_name', $this->product_name)
                ->where('provider_id', $this->provider)->where('date_exp', $this->product_date_exp)
                ->where('date_exp', $this->product_date_exp)->exists()) {
                $ingredent = Ingredent::create([
                    'ingredent_name' => $this->product_name
                ]);
                $price = Price::create([
                    'price_cost' => $this->product_price,
                    'category' => 2
                ]);
                IngredentDetail::create([
                    'ingredent_id' => $ingredent->getKey(),
                    'ingredent_name' => $this->product_name,
                    'price_id' => $price->getKey(),
                    'provider_id' => $this->provider,
                    'date_exp' =>  $this->product_date_exp,
                ]);
                $this->closeAdd();
                $this->dispatchBrowserEvent('alert', [
                    'type' => 'success',
                    'message' => "Đã thêm!"
                ]);
            } else {
                $this->noti = 'Sản phẩm hiện đã có!';
            }
        }
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
    public function importGoods()
    {
        $this->validate([
            'category' => 'required',
            'provider' => 'required',
            'product' => 'required',
            'amount_add' => 'required',
            'date_add' => 'required',
            'date_exp' => 'required|after:date_add',

        ]);
        if ($this->category == 1) {

            $drink = DrinkDetail::where('drink_name', $this->product)->first();
            if (!DrinkDetail::where('drink_name', $this->product)->where('date_exp', $this->date_exp)->exists()) {
                $drinkNew = Drink::create([
                    'drink_name' => $this->product,
                    'category' => 1,
                ]);
                $price = Price::create([
                    'price_cost' => $drink->price->price_cost,
                    'category' => 1
                ]);
                DrinkDetail::create([
                    'drink_id' => $drinkNew->getKey(),
                    'drink_name' => $this->product,
                    'price_id' => $price->getKey(),
                    'provider_id' => $this->provider,
                    'amount' => $this->amount_add,
                    'date_add' => $this->date_add,
                    'date_exp' =>  $this->date_exp,
                    'image' => $drink->image
                ]);
                ImportgoodsDrink::create([
                    'drink_id' => $drinkNew->getKey(),
                    'amount_add' => $this->amount_add,
                    'date_add' => $this->date_add
                ]);
                $this->closeAdd();
            } else {
                $drinkUpdate = DrinkDetail::where('drink_name', $this->product)->where('date_exp', $this->date_exp)->first();
                DrinkDetail::where('drink_name', $this->product)->where('date_exp', $this->date_exp)->update([
                    'amount' => $drinkUpdate->amount + $this->amount_add,
                    'date_add' => $this->date_add,
                ]);
                ImportgoodsDrink::create([
                    'drink_id' => $drinkUpdate->drink_id,
                    'amount_add' => $this->amount_add,
                    'date_add' => $this->date_add
                ]);
                $this->closeAdd();
            }
        } else {

            $ingredent = IngredentDetail::where('ingredent_name', $this->product)->first();
            if (!IngredentDetail::where('ingredent_name', $this->product)->where('date_exp', $this->date_exp)->exists()) {
                $ingredentNew = Ingredent::create([
                    'ingredent_name' => $this->product,
                ]);
                $price = Price::create([
                    'price_cost' => $ingredent->price->price_cost,
                    'category' => 2
                ]);
                IngredentDetail::create([
                    'ingredent_id' => $ingredentNew->getKey(),
                    'ingredent_name' => $this->product,
                    'price_id' => $price->getKey(),
                    'provider_id' => $this->provider,
                    'amount' => $this->amount_add,
                    'date_add' => $this->date_add,
                    'date_exp' =>  $this->date_exp,
                ]);
                ImportgoodsIngredent::create([
                    'ingredent_id' => $ingredentNew->getKey(),
                    'amount_add' => $this->amount_add,
                    'date_add' => $this->date_add
                ]);
                $this->closeAdd();
            } else {
                $ingredentUpdate = IngredentDetail::where('ingredent_name', $this->product)->where('date_exp', $this->date_exp)->first();
                IngredentDetail::where('ingredent_name', $this->product)->where('date_exp', $this->date_exp)->update([
                    'amount' => $ingredentUpdate->amount + $this->amount_add,
                    'date_add' => $this->date_add,
                ]);
                ImportgoodsIngredent::create([
                    'ingredent_id' => $ingredentUpdate->ingredent_id,
                    'amount_add' => $this->amount_add,
                    'date_add' => $this->date_add
                ]);
                $this->closeAdd();
            }
        }
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Đã thêm vào kho!"
        ]);
    }
}
