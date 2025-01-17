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

namespace pocketmine\network\mcpe\protocol\types\skin;

use function strlen;

class SkinImage{

	public const PIXEL_SIZE = 4;

	public const SINGLE_SKIN_SIZE = 64 * 32 * self::PIXEL_SIZE;
	public const DOUBLE_SKIN_SIZE = 64 * 64 * self::PIXEL_SIZE;
	public const SKIN_128_32_SIZE = 128 * 32 * self::PIXEL_SIZE;
	public const SKIN_128_64_SIZE = 128 * 64 * self::PIXEL_SIZE;
	public const SKIN_128_128_SIZE = 128 * 128 * self::PIXEL_SIZE;
	public const SKIN_256_32_SIZE = 256 * 32 * self::PIXEL_SIZE;
	public const SKIN_256_64_SIZE = 256 * 64 * self::PIXEL_SIZE;
	public const SKIN_256_128_SIZE = 256 * 128 * self::PIXEL_SIZE;
	public const SKIN_256_256_SIZE = 256 * 256 * self::PIXEL_SIZE;
	public const SKIN_512_32_SIZE = 512 * 32 * self::PIXEL_SIZE;
	public const SKIN_512_64_SIZE = 512 * 64 * self::PIXEL_SIZE;
	public const SKIN_512_128_SIZE = 512 * 128 * self::PIXEL_SIZE;
	public const SKIN_512_256_SIZE = 512 * 256 * self::PIXEL_SIZE;
	public const SKIN_512_512_SIZE = 512 * 512 * self::PIXEL_SIZE;

	public function __construct(
		private int $height,
		private int $width,
		private string $data
	){
		if($height < 0 or $width < 0){
			throw new \InvalidArgumentException("Height and width cannot be negative");
		}
		if(($expected = $height * $width * 4) !== ($actual = strlen($data))){
			throw new \InvalidArgumentException("Data should be exactly $expected bytes, got $actual bytes");
		}
	}

	public static function fromLegacy(string $data) : SkinImage{
		return match(strlen($data)){
			self::SINGLE_SKIN_SIZE => new self(32, 64, $data),
			self::DOUBLE_SKIN_SIZE => new self(64, 64, $data),
			self::SKIN_128_32_SIZE => new self(32, 128, $data),
			self::SKIN_128_64_SIZE => new self(64, 128, $data),
			self::SKIN_128_128_SIZE => new self(128, 128, $data),
			self::SKIN_256_32_SIZE => new self(32, 256, $data),
			self::SKIN_256_64_SIZE => new self(64, 256, $data),
			self::SKIN_256_128_SIZE => new self(128, 256, $data),
			self::SKIN_256_256_SIZE => new self(256, 256, $data),
			self::SKIN_512_32_SIZE => new self(32, 512, $data),
			self::SKIN_512_64_SIZE => new self(64, 512, $data),
			self::SKIN_512_128_SIZE => new self(128, 512, $data),
			self::SKIN_512_256_SIZE => new self(256, 512, $data),
			self::SKIN_512_512_SIZE => new self(512, 512, $data)
		};

		throw new \InvalidArgumentException("Unknown size");
	}

	public function getHeight() : int{
		return $this->height;
	}

	public function getWidth() : int{
		return $this->width;
	}

	public function getData() : string{
		return $this->data;
	}
}
