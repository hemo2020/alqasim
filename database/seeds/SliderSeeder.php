<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Slider;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $imageName = 'home.jpg';
        $imagePath = public_path('demo/' . $imageName);

        if (!Storage::disk('public')->exists('slider')) {
            Storage::disk('public')->makeDirectory('slider');
        }

        Storage::disk('public')->put('slider/' . $imageName, file_get_contents($imagePath));

        $slider = new Slider();
        $slider->title = 'New Slider';
        $slider->description = 'This is a new slider added via seed.';
        $slider->image = $imageName;
        $slider->save();
    }
}
