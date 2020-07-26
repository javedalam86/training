<?php

use Illuminate\Database\Seeder;
use App\Models\Order;
use Carbon\Carbon;

class OrderTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    Order::create([
      "course_id" =>"1",
      "candidate_id" => "52",
      "price" => "123",
      "transaction_id" => "",
      "payment_date" => Carbon::now(),
      "payment_status"=> "pending",
      "payment_type"=>1,
      "added_date" => Carbon::now()
    ]);

    Order::create([
      "course_id" =>"1",
      "candidate_id" => "52",
      "price" => "123",
      "transaction_id" => "",
      "payment_date" => Carbon::now(),
      "payment_status"=> "pending",
      "payment_type"=>1,
      "added_date" => Carbon::now()
    ]);

    Order::create([
      "course_id" =>"2",
      "candidate_id" => "55",
      "price" => "123",
      "transaction_id" => "",
      "payment_date" => Carbon::now(),
      "payment_status"=> "fail",
      "payment_type"=>1,
      "added_date" => Carbon::now(),
    ]);

    Order::create([
      "course_id" =>"2",
      "candidate_id" => "55",
      "price" => "123",
      "transaction_id" => "",
      "payment_date" => Carbon::now(),
      "payment_status"=> "success",
      "payment_type"=>1,
      "added_date" => Carbon::now()
    ]);

    Order::create([
      "course_id" =>"3",
      "candidate_id" => "55",
      "price" => "123",
      "transaction_id" => "",
      "payment_date" => Carbon::now(),
      "payment_status"=> "process",
      "payment_type"=>1,
      "added_date" => Carbon::now(),
    ]);

    Order::create([
      "course_id" =>"4",
      "candidate_id" => "57",
      "price" => "123",
      "transaction_id" => "",
      "payment_date" => Carbon::now(),
      "payment_status"=> "cancel",
      "payment_type"=> 1,
      "added_date" => Carbon::now()
    ]);

    Order::create([
      "course_id" =>"5",
      "candidate_id" => "57",
      "price" => "123",
      "transaction_id" => "",
      "payment_date" => Carbon::now(),
      "payment_status"=> "pending",
      "payment_type"=>1,
      "added_date" => Carbon::now()
    ]);
  }
}
