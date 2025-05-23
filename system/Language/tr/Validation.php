<?php

/**
 * This file is part of the CodeIgniter 4 framework.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

// Validation language settings
return [
	// Core Messages
	'noRuleSets'      => 'Doğrulama ayarlarında kural kümesi tanımlanmamış.',
	'ruleNotFound'    => '{0} geçerli bir kural değil.',
	'groupNotFound'   => '{0} geçerli bir kural grubu değil.',
	'groupNotArray'   => '{0} kural grubu bir dizi olmalı.',
	'invalidTemplate' => '{0} geçerli bir doğrulama şablonu değil.',

	// Rule Messages
	'alpha'                 => '{field} alanı yalnız alfabetik karakterler içerebilir.',
	'alpha_dash'            => '{field} alanı yalnız harf, rakam, alt çizgi ve tire içerebilir.',
	'alpha_numeric'         => '{field} alanı yalnız harf ve rakam içerebilir.',
	'alpha_numeric_space'   => '{field} alanı yalnız harf, rakam ve boşluk içerebilir.',
	'alpha_space'           => '{field} alanı yalnız harf ve boşluk içerebilir.',
	'decimal'               => '{field} alanı bir sayı içermeli.',
	'differs'               => '{field} alanı {param} alanından farklı olmalı.',
	'equals'                => '{field} alanı {param} alanı ile eşit olmalı.',
	'exact_length'          => '{field} alanı {param} karakter uzunluğunda olmalı.',
	'greater_than'          => '{field} alanı {param} den büyük bir sayı içermeli.',
	'greater_than_equal_to' => '{field} alanı {param} den büyük veya eşit bir sayı içermeli.',
	'in_list'               => '{field} alanı şunlardan biri olmalı: {param}.',
	'integer'               => '{field} alanı bir tamsayı içermeli.',
	'is_natural'            => '{field} alanı yalnız rakam içermeli.',
	'is_natural_no_zero'    => '{field} alanı yalnız rakam içermeli ve sıfırdan büyük olmalı.',
	'is_not_unique'         => '{field} alanı, veritabanında önceden var olan bir değeri içermeli.',
	'is_unique'             => '{field} alanı eşsiz bir değer içermeli.',
	'less_than'             => '{field} alanı {param} den küçük bir sayı içermeli.',
	'less_than_equal_to'    => '{field} alanı {param} den küçük veya eşit bir sayı içermeli.',
	'matches'               => '{field} alanı ile {param} alanı aynı olmalı.',
	'max_length'            => '{field} alanı {param} karakterden fazla olamaz.',
	'min_length'            => '{field} alanı en az {param} karakter olmalı.',
	'not_equals'            => '{field} alanı {param} alanı ile eşit olmamalı.',
	'numeric'               => '{field} alanı yalnız sayı içermeli.',
	'regex_match'           => '{field} alanı doğru biçimde değil.',
	'required'              => '{field} alanı boş bırakılamaz.',
	'required_with'         => '{param} olduğunda {field} alanı da olmalı.',
	'required_without'      => '{param} olmadığında {field} alanı gerekli.',
	'timezone'              => '{field} alanı geçerli bir saat dilimi olmalı.',
	'valid_base64'          => '{field} alanı geçerli bir base64 dizisi olmalı.',
	'valid_email'           => '{field} alanı geçerli bir email adresi içermeli.',
	'valid_emails'          => '{field} alanı geçerli email adresleri içermeli.',
	'valid_ip'              => '{field} alanı geçerli bir IP içermeli.',
	'valid_url'             => '{field} alanı geçerli bir URL içermeli.',
	'valid_date'            => '{field} alanı geçerli bir tarih içermeli.',

	// Credit Cards
	'valid_cc_num' => '{field} geçerli bir kredi kartı numarası değil.',

	// Files
	'uploaded' => '{field} seçiniz.',
	'max_size' => '{field} çok büyük dosya.',
	'is_image' => '{field} geçerli bir yüklenen resim dosyası değil.',
	'mime_in'  => '{field} alanında geçerli bir dosya türü yok.',
	'ext_in'   => '{field} alanında geçerli bir dosya uzantısı yok.',
	'max_dims' => '{field} bir resim değil veya çok geniş ya da uzun.',
];
