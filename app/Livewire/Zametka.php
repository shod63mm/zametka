<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ZametkaCard;
use App\Models\ZametkaGroup;

class Zametka extends Component
{

    public $title;

    public $addGroupState = false;

    public $addCardState = "";

    protected $rules = [
        'title' => 'required',
    ];

    public function addGroup()
    {
        $this->addGroupState = true;
    }

    public function addTask($group_id)
    {
        $this->addCardState = $group_id;
    }

    public function deleteGroup($id)
    {
        ZametkaGroup::destroy($id);
    }

    public function deleteCard($id)
    {
        ZametkaCard::destroy($id);
    }

    public function save()
    {
        $data = $this->validate();

        if($this->addGroupState) {
            ZametkaGroup::create($data);
        } else {
            $data["zametka_group_id"] = $this->addCardState;

            ZametkaCard::create($data);
        }

        $this->reset();
    }

    protected function sorting($order)
    {
        foreach ($order as $group) {
            ZametkaGroup::where(['id' => $group["value"]])->update(['sort' => $group['order']]);

            if (isset($group["items"])) {
                foreach ($group["items"] as $card) {
                    ZametkaCard::where(['id' => $card["value"]])->update([
                        'zametka_group_id' => $group['value'],
                        'sort' => $card['order']
                    ]);
                }
            }
        }
    }

    public function updateOrder($order)
    {
        $this->sorting($order);
    }

    public function render()
    {
        $groups = ZametkaGroup::orderBy("sort")->get();

        return view('livewire.zametka', [
            'groups' => $groups,
        ]);
    }
}
