<?php

namespace RomanPavliukov\Honeycombs\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class HoneyController extends Controller
{
    protected $configs;

    public function __construct() {
        $json = file_get_contents(public_path() . "/../honeycombs.json");
        $configs = json_decode($json, true);
        $this->configs = $configs;
    }

    public function lobbyView(Request $request) {
        return view('honeycombs::lobby', [
            'configs' => $this->configs
        ]);
    }

    public function itemsOfCategory($category) {
        $items = DB::table($category)->get();

        return view('honeycombs::category_items', [
            'configs' => $this->configs,
            'category' => $category,
            'items' => $items,
            'representative_column' => $this->configs[$category]["representative_column"]
        ]);
    }

    public function addItemView($category) {

        $relations = false;
        $relation_representative_column = "";

        if (isset($this->configs[$category]["relations"])) {
            $to_column = $this->configs[$category]["relations"]["to_column"];
            $relations = DB::table($to_column)
                ->get();
            $relation_representative_column = $this->configs[$to_column]["representative_column"];
        }

        return view('honeycombs::additem', [
            'configs' => $this->configs,
            'category' => $category,
            'relations' => $relations,
            'representative_column' => $this->configs[$category]["representative_column"],
            'relation_representative_column' => $relation_representative_column
        ]);
    }

    public function addItemAction(Request $request, $category) {
        $data = $request->all();
        $token = array_shift($data);
        DB::table($category)->insert($data);
        return 1;
    }

    public function editItemView($category, $id) {

        $relations = false;
        $relation_representative_column = "";

        $item = DB::table($category)
            ->where("id", $id)
            ->get()
            ->first();

        if (isset($this->configs[$category]["relations"])) {
            $to_column = $this->configs[$category]["relations"]["to_column"];
            $relations = DB::table($to_column)
                ->get();
            $relation_representative_column = $this->configs[$to_column]["representative_column"];
        }

        return view('honeycombs::edititem', [
            'configs' => $this->configs,
            'category' => $category,
            'id' => $id,
            'item' => $item,
            'relations' => $relations,
            'relation_representative_column' => $relation_representative_column
        ]);
    }

    public function editItemAction(Request $request, $category, $id) {
        $data = $request->all();
        $token = array_shift($data);
        DB::table($category)->where('id', $id)->update($data);
        return 1;
    }
}
