<?php
namespace App\MyClasses;

use Illuminate\Support\Facades\Log;

class PowerMyService implements MyServiceInterFace
{
    private $id = -1;
    private $msg = 'no id...';
    private $data = ['いちご', 'リンゴ', 'バナナ', 'みかん', 'ぶどう'];

    function __construct()
    {
        $this->setId(rand(0, count($this->data)));
    }

    public function setId($id)
    {
        Log::info("さーびす！");
        if ($id >= 0 && $id < count($this->data))
        {
            $this->id = $id;
            $this->msg = "あなたが好きなのは、" . $id . "番の" . $this->data[$id] . "ですね！";
        }
    }

    public function say()
    {
        return $this->msg;
    }

    public function data(int $id)
    {
        return $this->data[$id];
    }

    public function setdata($data)
    {
        $this->data = $data;
    }

    public function alldata()
    {
        return $this->data;
    }
}
