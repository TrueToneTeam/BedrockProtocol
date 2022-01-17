<?php

/*
 * This file is part of BedrockProtocol.
 * Copyright (C) 2014-2022 PocketMine Team <https://github.com/pmmp/BedrockProtocol>
 *
 * BedrockProtocol is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 */

declare(strict_types=1);

namespace pocketmine\network\mcpe\protocol\types\recipe;

final class RecipeIngredient{

	private int $id;
	private int $meta;
	private int $count;

	public function __construct(int $id, int $meta, int $count){
		$this->id = $id;
		$this->meta = $meta;
		$this->count = $count;
	}

	public function getId() : int{
		return $this->id;
	}

	public function getMeta() : int{
		return $this->meta;
	}

	public function getCount() : int{
		return $this->count;
	}
}
