<?php

namespace Hametuha\Torima\Data;


use Hametuha\Torima\Pattern\DataStore;

class Prefecture extends DataStore {

	public static $prefs = [
		[
			'北海道',
			'hokkaidou',
			[
				[ '北海道', 'hokkaidou' ],
			],
		],
		[
			'東北',
			'touhoku',
			[
				[ '青森県', 'aomori-ken' ],
				[ '秋田県', 'akita-ken' ],
				[ '岩手県', 'iwate-ken' ],
				[ '宮城県', 'miyagi-ken' ],
				[ '山形県', 'yamagata-ken' ],
				[ '福島県', 'fukushima-ken' ],
			],
		],
		[
			'関東',
			'kantou',
			[
				[ '栃木県', 'tochigi-ken' ],
				[ '群馬県', 'gunnma-ken' ],
				[ '茨城県', 'ibaraki-ken' ],
				[ '埼玉県', 'saitama-ken' ],
				[ '千葉県', 'chiba-ken' ],
				[ '東京都', 'tokyo-to' ],
				[ '神奈川県', 'kanagawa-ken' ],
			],
		],
		[
			'中部',
			'chubu',
			[
				[ '新潟県', 'niigata-ken' ],
				[ '富山県', 'toyama-ken' ],
				[ '石川県', 'ishikawa-ken' ],
				[ '福井県', 'fukui-ken' ],
				[ '長野県', 'nagano-ken' ],
				[ '山梨県', 'yamanashi-ken' ],
				[ '岐阜県', 'gifu-ken' ],
				[ '静岡県', 'shizuoka-ken' ],
				[ '愛知県', 'aichi-ken' ],
			],
		],
		[
			'近畿',
			'kinki',
			[
				[ '京都府', 'kyouto-fu' ],
				[ '滋賀県', 'shiga-ken' ],
				[ '兵庫県', 'hyogo-ken' ],
				[ '大阪府', 'oosaka-fu' ],
				[ '三重県', 'mie-ken' ],
				[ '奈良県', 'nara-ken' ],
				[ '和歌山県', 'wakayama-ken' ],
			],
		],
		[
			'中国',
			'chugoku',
			[
				[ '鳥取県', 'tottori-ken' ],
				[ '島根県', 'shimane-ken' ],
				[ '岡山県', 'okayama-ken' ],
				[ '広島県', 'hiroshima-ken' ],
				[ '山口県', 'yamaguchi-ken' ],
			],
		],
		[
			'四国',
			'chikoku',
			[
				[ '香川県', 'kagawa-ken' ],
				[ '愛媛県', 'ehime-ken' ],
				[ '徳島県', 'tokushima-ken' ],
				[ '高知県', 'kouchi-ken' ],

			],
		],
		[
			'九州',
			'kyushu',
			[

				[ '福岡県', 'fukuoka-ken' ],
				[ '佐賀県', 'saga-ken' ],
				[ '長崎県', 'nagasaki-ken' ],
				[ '大分県', 'ooita-ken' ],
				[ '熊本県', 'kumamoto-ken' ],
				[ '宮崎県', 'miyazaki-ken' ],
				[ '鹿児島県', 'kagoshima-ken' ],
			],
		],
		[
			'沖縄',
			'okinawa',
			[
				[ '沖縄県', 'okinawa-ken' ],
			],
		]
	];
}