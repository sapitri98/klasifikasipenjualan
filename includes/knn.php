<?php
class KNN
{

	public $dataset;
	protected $target;
	protected $nilai;
	protected $k_nearest;

	protected $nilai_konversi;
	public $dataset_nilai;
	protected $minmax;
	public $normal;
	public $jarak;
	public $nearest;
	public $total;
	public $hasil;

	function __construct($dataset, $target, $nilai, $k_nearest)
	{
		$this->dataset = $dataset;
		$this->target = $target;
		$this->nilai = $nilai;
		$this->k_nearest = $k_nearest;

		$this->dataset_nilai();
		$this->normal();
		$this->jarak();
		$this->nearest();

		//print_r($this);
	}

	function normal()
	{
		$temp = array();
		foreach ($this->dataset_nilai as $key => $val) {
			foreach ($val as $k => $v) {
				if ($k != $this->target) {
					$temp[$k][$key] = $v;
				}
			}
		}
		foreach ($temp as $key => $val) {
			$this->minmax[$key]['max'] = max($val);
			$this->minmax[$key]['min'] = min($val);
		}
		$this->normal = $this->dataset_nilai;
		foreach ($this->normal as $key => $val) {
			foreach ($val as $k => $v) {
				if ($k !== $this->target)
					$this->normal[$key][$k] = $this->get_normal($v, $k);
			}
		}
		//echo '<pre>' . print_r($this->normal, 1) . '</pre>';
	}
	function get_normal($v, $k)
	{
		return ($v - $this->minmax[$k]['min']) / ($this->minmax[$k]['max'] -  $this->minmax[$k]['min']);
	}
	function dataset_nilai()
	{
		global $ATRIBUT_NILAI;
		$this->nilai_konversi = array();
		foreach ($ATRIBUT_NILAI as $key => $val) {
			$no = 1;
			foreach ($val as $k => $v) {
				$this->nilai_konversi[$k] = $no;
				$no++;
			}
		}
		$this->dataset_nilai = array();
		foreach ($this->dataset as $key => $val) {
			foreach ($val as $k => $v) {
				$this->dataset_nilai[$key][$k] = ($k == $this->target || !$ATRIBUT_NILAI[$k]) ? $v :  $this->nilai_konversi[$v];
			}
		}
		//echo '<pre>' . print_r($this->nilai_konversi, 1) . '</pre>';
	}

	function nearest()
	{
		$no = 1;
		foreach ($this->jarak as $key => $val) {
			$this->nearest[] = $key;
			$this->total[$this->normal[$key][$this->target]]++;
			if ($no++ >= $this->k_nearest)
				break;
		}
		arsort($this->total);
		$this->hasil  = key($this->total);
	}

	function jarak()
	{
		$arr = array();
		//menormalkan nilai inputan user
		$nilai_normal = array();
		foreach ($this->nilai as $k => $v) {
			$v = $this->nilai_konversi[$v] ? $this->nilai_konversi[$v] : $v;
			$nilai_normal[$k] = $this->get_normal($v, $k);
		}
		//echo '<pre>' . print_r($nilai_normal, 1) . '</pre>';
		foreach ($this->normal as $key => $val) {
			foreach ($val as $k => $v) {
				if ($k != $this->target) {
					$arr[$key] += pow($v - $nilai_normal[$k], 2);
				}
			}
		}
		foreach ($arr as $key => $val) {
			$this->jarak[$key] = sqrt($val);
		}
		asort($this->jarak);
	}
}
