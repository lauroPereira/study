<?php
interface Dto{
	function selectAll();
	function select($map);
        function count();
	function find($id);
	function update();
	function delete();
	function insert();
}