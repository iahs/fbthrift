<?hh // strict
/**
 * Autogenerated by Thrift
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */

/**
 * Original thrift enum:-
 * Enum
 */
enum Enum: int {
  ENUM = 1;
}

class Enum_TEnumStaticMetadata implements \IThriftEnumStaticMetadata {
  public static function getAllStructuredAnnotations(): \TEnumAnnotations {
    return shape(
      'enum' => dict[],
      'constants' => dict[
      ],
    );
  }
}

/**
 * Original thrift struct:-
 * A
 */
class A implements \IThriftStruct, \IThriftShapishStruct {
  use \ThriftSerializationTrait;

  const dict<int, this::TFieldSpec> SPEC = dict[
    1 => shape(
      'var' => 'a',
      'type' => \TType::STRING,
    ),
  ];
  const dict<string, int> FIELDMAP = dict[
    'a' => 1,
  ];

  const type TConstructorShape = shape(
    ?'a' => ?string,
  );

  const type TShape = shape(
    'a' => string,
    ...
  );
  const int STRUCTURAL_ID = 7939807933046472325;
  /**
   * Original thrift field:-
   * 1: string a
   */
  public string $a;

  <<__Rx>>
  public function __construct(?string $a = null  ) {
    $this->a = $a ?? '';
  }

  <<__Rx>>
  public static function withDefaultValues(): this {
    return new static();
  }

  <<__Rx>>
  public static function fromShape(self::TConstructorShape $shape): this {
    return new static(
      Shapes::idx($shape, 'a'),
    );
  }

  public function getName(): string {
    return 'A';
  }

  public static function getAllStructuredAnnotations(): \TStructAnnotations {
    return shape(
      'struct' => dict[],
      'fields' => dict[
      ],
    );
  }

  public static function __stringifyMapKeys<T>(Map<arraykey, T> $m): Map<string, T> {
    $new_map = Map {};
    foreach ($m as $k => $v) {
      $new_map[(string)$k] = $v;
    }
    return $new_map;
  }

  <<__Rx>>
  public static function __fromShape(self::TShape $shape): this {
    $me = new static();
    $me->a = $shape['a'];
    return $me;
  }

  <<__Rx>>
  public function __toShape(): self::TShape {
    return shape(
      'a' => $this->a,
    );
  }
}

/**
 * Original thrift struct:-
 * B
 */
class B implements \IThriftStruct, \IThriftShapishStruct {
  use \ThriftSerializationTrait;

  const dict<int, this::TFieldSpec> SPEC = dict[
    1 => shape(
      'var' => 'just_an_A',
      'type' => \TType::STRUCT,
      'class' => A::class,
    ),
    2 => shape(
      'var' => 'set_of_i32',
      'type' => \TType::SET,
      'etype' => \TType::I32,
      'elem' => shape(
        'type' => \TType::I32,
      ),
      'format' => 'collection',
    ),
    3 => shape(
      'var' => 'list_of_i32',
      'type' => \TType::LST,
      'etype' => \TType::I32,
      'elem' => shape(
        'type' => \TType::I32,
      ),
      'format' => 'collection',
    ),
    4 => shape(
      'var' => 'list_of_string',
      'type' => \TType::LST,
      'etype' => \TType::STRING,
      'elem' => shape(
        'type' => \TType::STRING,
      ),
      'format' => 'collection',
    ),
    5 => shape(
      'var' => 'map_of_string_to_i32',
      'type' => \TType::MAP,
      'ktype' => \TType::STRING,
      'vtype' => \TType::I32,
      'key' => shape(
        'type' => \TType::STRING,
      ),
      'val' => shape(
        'type' => \TType::I32,
      ),
      'format' => 'collection',
    ),
    6 => shape(
      'var' => 'map_of_string_to_A',
      'type' => \TType::MAP,
      'ktype' => \TType::STRING,
      'vtype' => \TType::STRUCT,
      'key' => shape(
        'type' => \TType::STRING,
      ),
      'val' => shape(
        'type' => \TType::STRUCT,
        'class' => A::class,
      ),
      'format' => 'collection',
    ),
    7 => shape(
      'var' => 'map_of_string_to_list_of_i32',
      'type' => \TType::MAP,
      'ktype' => \TType::STRING,
      'vtype' => \TType::LST,
      'key' => shape(
        'type' => \TType::STRING,
      ),
      'val' => shape(
        'type' => \TType::LST,
        'etype' => \TType::I32,
        'elem' => shape(
          'type' => \TType::I32,
        ),
        'format' => 'collection',
      ),
      'format' => 'collection',
    ),
    8 => shape(
      'var' => 'map_of_string_to_list_of_A',
      'type' => \TType::MAP,
      'ktype' => \TType::STRING,
      'vtype' => \TType::LST,
      'key' => shape(
        'type' => \TType::STRING,
      ),
      'val' => shape(
        'type' => \TType::LST,
        'etype' => \TType::STRUCT,
        'elem' => shape(
          'type' => \TType::STRUCT,
          'class' => A::class,
        ),
        'format' => 'collection',
      ),
      'format' => 'collection',
    ),
    9 => shape(
      'var' => 'map_of_string_to_set_of_i32',
      'type' => \TType::MAP,
      'ktype' => \TType::STRING,
      'vtype' => \TType::SET,
      'key' => shape(
        'type' => \TType::STRING,
      ),
      'val' => shape(
        'type' => \TType::SET,
        'etype' => \TType::I32,
        'elem' => shape(
          'type' => \TType::I32,
        ),
        'format' => 'collection',
      ),
      'format' => 'collection',
    ),
    10 => shape(
      'var' => 'map_of_string_to_map_of_string_to_i32',
      'type' => \TType::MAP,
      'ktype' => \TType::STRING,
      'vtype' => \TType::MAP,
      'key' => shape(
        'type' => \TType::STRING,
      ),
      'val' => shape(
        'type' => \TType::MAP,
        'ktype' => \TType::STRING,
        'vtype' => \TType::I32,
        'key' => shape(
          'type' => \TType::STRING,
        ),
        'val' => shape(
          'type' => \TType::I32,
        ),
        'format' => 'collection',
      ),
      'format' => 'collection',
    ),
    11 => shape(
      'var' => 'map_of_string_to_map_of_string_to_A',
      'type' => \TType::MAP,
      'ktype' => \TType::STRING,
      'vtype' => \TType::MAP,
      'key' => shape(
        'type' => \TType::STRING,
      ),
      'val' => shape(
        'type' => \TType::MAP,
        'ktype' => \TType::STRING,
        'vtype' => \TType::STRUCT,
        'key' => shape(
          'type' => \TType::STRING,
        ),
        'val' => shape(
          'type' => \TType::STRUCT,
          'class' => A::class,
        ),
        'format' => 'collection',
      ),
      'format' => 'collection',
    ),
    12 => shape(
      'var' => 'list_of_set_of_i32',
      'type' => \TType::LST,
      'etype' => \TType::SET,
      'elem' => shape(
        'type' => \TType::SET,
        'etype' => \TType::I32,
        'elem' => shape(
          'type' => \TType::I32,
        ),
        'format' => 'collection',
      ),
      'format' => 'collection',
    ),
    13 => shape(
      'var' => 'list_of_map_of_string_to_list_of_A',
      'type' => \TType::LST,
      'etype' => \TType::MAP,
      'elem' => shape(
        'type' => \TType::MAP,
        'ktype' => \TType::STRING,
        'vtype' => \TType::LST,
        'key' => shape(
          'type' => \TType::STRING,
        ),
        'val' => shape(
          'type' => \TType::LST,
          'etype' => \TType::STRUCT,
          'elem' => shape(
            'type' => \TType::STRUCT,
            'class' => A::class,
          ),
          'format' => 'collection',
        ),
        'format' => 'collection',
      ),
      'format' => 'collection',
    ),
    14 => shape(
      'var' => 'list_of_map_of_string_to_A',
      'type' => \TType::LST,
      'etype' => \TType::MAP,
      'elem' => shape(
        'type' => \TType::MAP,
        'ktype' => \TType::STRING,
        'vtype' => \TType::STRUCT,
        'key' => shape(
          'type' => \TType::STRING,
        ),
        'val' => shape(
          'type' => \TType::STRUCT,
          'class' => A::class,
        ),
        'format' => 'collection',
      ),
      'format' => 'collection',
    ),
    15 => shape(
      'var' => 'list_of_self',
      'type' => \TType::LST,
      'etype' => \TType::STRUCT,
      'elem' => shape(
        'type' => \TType::STRUCT,
        'class' => B::class,
      ),
      'format' => 'collection',
    ),
    16 => shape(
      'var' => 'map_of_string_to_self',
      'type' => \TType::MAP,
      'ktype' => \TType::STRING,
      'vtype' => \TType::STRUCT,
      'key' => shape(
        'type' => \TType::STRING,
      ),
      'val' => shape(
        'type' => \TType::STRUCT,
        'class' => B::class,
      ),
      'format' => 'collection',
    ),
    17 => shape(
      'var' => 'just_an_enum',
      'type' => \TType::I32,
      'enum' => Enum::class,
    ),
    51 => shape(
      'var' => 'optional_just_an_A',
      'type' => \TType::STRUCT,
      'class' => A::class,
    ),
    52 => shape(
      'var' => 'optional_set_of_i32',
      'type' => \TType::SET,
      'etype' => \TType::I32,
      'elem' => shape(
        'type' => \TType::I32,
      ),
      'format' => 'collection',
    ),
    53 => shape(
      'var' => 'optional_list_of_i32',
      'type' => \TType::LST,
      'etype' => \TType::I32,
      'elem' => shape(
        'type' => \TType::I32,
      ),
      'format' => 'collection',
    ),
    54 => shape(
      'var' => 'optional_list_of_string',
      'type' => \TType::LST,
      'etype' => \TType::STRING,
      'elem' => shape(
        'type' => \TType::STRING,
      ),
      'format' => 'collection',
    ),
    55 => shape(
      'var' => 'optional_map_of_string_to_i32',
      'type' => \TType::MAP,
      'ktype' => \TType::STRING,
      'vtype' => \TType::I32,
      'key' => shape(
        'type' => \TType::STRING,
      ),
      'val' => shape(
        'type' => \TType::I32,
      ),
      'format' => 'collection',
    ),
    56 => shape(
      'var' => 'optional_map_of_string_to_A',
      'type' => \TType::MAP,
      'ktype' => \TType::STRING,
      'vtype' => \TType::STRUCT,
      'key' => shape(
        'type' => \TType::STRING,
      ),
      'val' => shape(
        'type' => \TType::STRUCT,
        'class' => A::class,
      ),
      'format' => 'collection',
    ),
    57 => shape(
      'var' => 'optional_map_of_string_to_list_of_i32',
      'type' => \TType::MAP,
      'ktype' => \TType::STRING,
      'vtype' => \TType::LST,
      'key' => shape(
        'type' => \TType::STRING,
      ),
      'val' => shape(
        'type' => \TType::LST,
        'etype' => \TType::I32,
        'elem' => shape(
          'type' => \TType::I32,
        ),
        'format' => 'collection',
      ),
      'format' => 'collection',
    ),
    58 => shape(
      'var' => 'optional_map_of_string_to_list_of_A',
      'type' => \TType::MAP,
      'ktype' => \TType::STRING,
      'vtype' => \TType::LST,
      'key' => shape(
        'type' => \TType::STRING,
      ),
      'val' => shape(
        'type' => \TType::LST,
        'etype' => \TType::STRUCT,
        'elem' => shape(
          'type' => \TType::STRUCT,
          'class' => A::class,
        ),
        'format' => 'collection',
      ),
      'format' => 'collection',
    ),
    59 => shape(
      'var' => 'optional_map_of_string_to_set_of_i32',
      'type' => \TType::MAP,
      'ktype' => \TType::STRING,
      'vtype' => \TType::SET,
      'key' => shape(
        'type' => \TType::STRING,
      ),
      'val' => shape(
        'type' => \TType::SET,
        'etype' => \TType::I32,
        'elem' => shape(
          'type' => \TType::I32,
        ),
        'format' => 'collection',
      ),
      'format' => 'collection',
    ),
    60 => shape(
      'var' => 'optional_enum',
      'type' => \TType::I32,
      'enum' => Enum::class,
    ),
  ];
  const dict<string, int> FIELDMAP = dict[
    'just_an_A' => 1,
    'set_of_i32' => 2,
    'list_of_i32' => 3,
    'list_of_string' => 4,
    'map_of_string_to_i32' => 5,
    'map_of_string_to_A' => 6,
    'map_of_string_to_list_of_i32' => 7,
    'map_of_string_to_list_of_A' => 8,
    'map_of_string_to_set_of_i32' => 9,
    'map_of_string_to_map_of_string_to_i32' => 10,
    'map_of_string_to_map_of_string_to_A' => 11,
    'list_of_set_of_i32' => 12,
    'list_of_map_of_string_to_list_of_A' => 13,
    'list_of_map_of_string_to_A' => 14,
    'list_of_self' => 15,
    'map_of_string_to_self' => 16,
    'just_an_enum' => 17,
    'optional_just_an_A' => 51,
    'optional_set_of_i32' => 52,
    'optional_list_of_i32' => 53,
    'optional_list_of_string' => 54,
    'optional_map_of_string_to_i32' => 55,
    'optional_map_of_string_to_A' => 56,
    'optional_map_of_string_to_list_of_i32' => 57,
    'optional_map_of_string_to_list_of_A' => 58,
    'optional_map_of_string_to_set_of_i32' => 59,
    'optional_enum' => 60,
  ];

  const type TConstructorShape = shape(
    ?'just_an_A' => ?A,
    ?'set_of_i32' => ?Set<int>,
    ?'list_of_i32' => ?Vector<int>,
    ?'list_of_string' => ?Vector<string>,
    ?'map_of_string_to_i32' => ?Map<string, int>,
    ?'map_of_string_to_A' => ?Map<string, A>,
    ?'map_of_string_to_list_of_i32' => ?Map<string, Vector<int>>,
    ?'map_of_string_to_list_of_A' => ?Map<string, Vector<A>>,
    ?'map_of_string_to_set_of_i32' => ?Map<string, Set<int>>,
    ?'map_of_string_to_map_of_string_to_i32' => ?Map<string, Map<string, int>>,
    ?'map_of_string_to_map_of_string_to_A' => ?Map<string, Map<string, A>>,
    ?'list_of_set_of_i32' => ?Vector<Set<int>>,
    ?'list_of_map_of_string_to_list_of_A' => ?Vector<Map<string, Vector<A>>>,
    ?'list_of_map_of_string_to_A' => ?Vector<Map<string, A>>,
    ?'list_of_self' => ?Vector<B>,
    ?'map_of_string_to_self' => ?Map<string, B>,
    ?'just_an_enum' => ?Enum,
    ?'optional_just_an_A' => ?A,
    ?'optional_set_of_i32' => ?Set<int>,
    ?'optional_list_of_i32' => ?Vector<int>,
    ?'optional_list_of_string' => ?Vector<string>,
    ?'optional_map_of_string_to_i32' => ?Map<string, int>,
    ?'optional_map_of_string_to_A' => ?Map<string, A>,
    ?'optional_map_of_string_to_list_of_i32' => ?Map<string, Vector<int>>,
    ?'optional_map_of_string_to_list_of_A' => ?Map<string, Vector<A>>,
    ?'optional_map_of_string_to_set_of_i32' => ?Map<string, Set<int>>,
    ?'optional_enum' => ?Enum,
  );

  const type TShape = shape(
    ?'just_an_A' => ?A::TShape,
    'set_of_i32' => dict<int, bool>,
    'list_of_i32' => vec<int>,
    'list_of_string' => vec<string>,
    'map_of_string_to_i32' => dict<arraykey, int>,
    'map_of_string_to_A' => dict<arraykey, A::TShape>,
    'map_of_string_to_list_of_i32' => dict<arraykey, vec<int>>,
    'map_of_string_to_list_of_A' => dict<arraykey, vec<A::TShape>>,
    'map_of_string_to_set_of_i32' => dict<arraykey, dict<int, bool>>,
    'map_of_string_to_map_of_string_to_i32' => dict<arraykey, dict<arraykey, int>>,
    'map_of_string_to_map_of_string_to_A' => dict<arraykey, dict<arraykey, A::TShape>>,
    'list_of_set_of_i32' => vec<dict<int, bool>>,
    'list_of_map_of_string_to_list_of_A' => vec<dict<arraykey, vec<A::TShape>>>,
    'list_of_map_of_string_to_A' => vec<dict<arraykey, A::TShape>>,
    'list_of_self' => vec<B::TShape>,
    'map_of_string_to_self' => dict<arraykey, B::TShape>,
    ?'just_an_enum' => ?Enum,
    ?'optional_just_an_A' => ?A::TShape,
    ?'optional_set_of_i32' => ?dict<int, bool>,
    ?'optional_list_of_i32' => ?vec<int>,
    ?'optional_list_of_string' => ?vec<string>,
    ?'optional_map_of_string_to_i32' => ?dict<arraykey, int>,
    ?'optional_map_of_string_to_A' => ?dict<arraykey, A::TShape>,
    ?'optional_map_of_string_to_list_of_i32' => ?dict<arraykey, vec<int>>,
    ?'optional_map_of_string_to_list_of_A' => ?dict<arraykey, vec<A::TShape>>,
    ?'optional_map_of_string_to_set_of_i32' => ?dict<arraykey, dict<int, bool>>,
    ?'optional_enum' => ?Enum,
    ...
  );
  const int STRUCTURAL_ID = 8418159757686116954;
  /**
   * Original thrift field:-
   * 1: struct module.A just_an_A
   */
  public ?A $just_an_A;
  /**
   * Original thrift field:-
   * 2: set<i32> set_of_i32
   */
  public Set<int> $set_of_i32;
  /**
   * Original thrift field:-
   * 3: list<i32> list_of_i32
   */
  public Vector<int> $list_of_i32;
  /**
   * Original thrift field:-
   * 4: list<string> list_of_string
   */
  public Vector<string> $list_of_string;
  /**
   * Original thrift field:-
   * 5: map<string, i32> map_of_string_to_i32
   */
  public Map<string, int> $map_of_string_to_i32;
  /**
   * Original thrift field:-
   * 6: map<string, struct module.A> map_of_string_to_A
   */
  public Map<string, A> $map_of_string_to_A;
  /**
   * Original thrift field:-
   * 7: map<string, list<i32>> map_of_string_to_list_of_i32
   */
  public Map<string, Vector<int>> $map_of_string_to_list_of_i32;
  /**
   * Original thrift field:-
   * 8: map<string, list<struct module.A>> map_of_string_to_list_of_A
   */
  public Map<string, Vector<A>> $map_of_string_to_list_of_A;
  /**
   * Original thrift field:-
   * 9: map<string, set<i32>> map_of_string_to_set_of_i32
   */
  public Map<string, Set<int>> $map_of_string_to_set_of_i32;
  /**
   * Original thrift field:-
   * 10: map<string, map<string, i32>> map_of_string_to_map_of_string_to_i32
   */
  public Map<string, Map<string, int>> $map_of_string_to_map_of_string_to_i32;
  /**
   * Original thrift field:-
   * 11: map<string, map<string, struct module.A>> map_of_string_to_map_of_string_to_A
   */
  public Map<string, Map<string, A>> $map_of_string_to_map_of_string_to_A;
  /**
   * Original thrift field:-
   * 12: list<set<i32>> list_of_set_of_i32
   */
  public Vector<Set<int>> $list_of_set_of_i32;
  /**
   * Original thrift field:-
   * 13: list<map<string, list<struct module.A>>> list_of_map_of_string_to_list_of_A
   */
  public Vector<Map<string, Vector<A>>> $list_of_map_of_string_to_list_of_A;
  /**
   * Original thrift field:-
   * 14: list<map<string, struct module.A>> list_of_map_of_string_to_A
   */
  public Vector<Map<string, A>> $list_of_map_of_string_to_A;
  /**
   * Original thrift field:-
   * 15: list<struct module.B> list_of_self
   */
  public Vector<B> $list_of_self;
  /**
   * Original thrift field:-
   * 16: map<string, struct module.B> map_of_string_to_self
   */
  public Map<string, B> $map_of_string_to_self;
  /**
   * Original thrift field:-
   * 17: enum module.Enum just_an_enum
   */
  public ?Enum $just_an_enum;
  /**
   * Original thrift field:-
   * 51: struct module.A optional_just_an_A
   */
  public ?A $optional_just_an_A;
  /**
   * Original thrift field:-
   * 52: set<i32> optional_set_of_i32
   */
  public ?Set<int> $optional_set_of_i32;
  /**
   * Original thrift field:-
   * 53: list<i32> optional_list_of_i32
   */
  public ?Vector<int> $optional_list_of_i32;
  /**
   * Original thrift field:-
   * 54: list<string> optional_list_of_string
   */
  public ?Vector<string> $optional_list_of_string;
  /**
   * Original thrift field:-
   * 55: map<string, i32> optional_map_of_string_to_i32
   */
  public ?Map<string, int> $optional_map_of_string_to_i32;
  /**
   * Original thrift field:-
   * 56: map<string, struct module.A> optional_map_of_string_to_A
   */
  public ?Map<string, A> $optional_map_of_string_to_A;
  /**
   * Original thrift field:-
   * 57: map<string, list<i32>> optional_map_of_string_to_list_of_i32
   */
  public ?Map<string, Vector<int>> $optional_map_of_string_to_list_of_i32;
  /**
   * Original thrift field:-
   * 58: map<string, list<struct module.A>> optional_map_of_string_to_list_of_A
   */
  public ?Map<string, Vector<A>> $optional_map_of_string_to_list_of_A;
  /**
   * Original thrift field:-
   * 59: map<string, set<i32>> optional_map_of_string_to_set_of_i32
   */
  public ?Map<string, Set<int>> $optional_map_of_string_to_set_of_i32;
  /**
   * Original thrift field:-
   * 60: enum module.Enum optional_enum
   */
  public ?Enum $optional_enum;

  <<__Rx>>
  public function __construct(?A $just_an_A = null, ?Set<int> $set_of_i32 = null, ?Vector<int> $list_of_i32 = null, ?Vector<string> $list_of_string = null, ?Map<string, int> $map_of_string_to_i32 = null, ?Map<string, A> $map_of_string_to_A = null, ?Map<string, Vector<int>> $map_of_string_to_list_of_i32 = null, ?Map<string, Vector<A>> $map_of_string_to_list_of_A = null, ?Map<string, Set<int>> $map_of_string_to_set_of_i32 = null, ?Map<string, Map<string, int>> $map_of_string_to_map_of_string_to_i32 = null, ?Map<string, Map<string, A>> $map_of_string_to_map_of_string_to_A = null, ?Vector<Set<int>> $list_of_set_of_i32 = null, ?Vector<Map<string, Vector<A>>> $list_of_map_of_string_to_list_of_A = null, ?Vector<Map<string, A>> $list_of_map_of_string_to_A = null, ?Vector<B> $list_of_self = null, ?Map<string, B> $map_of_string_to_self = null, ?Enum $just_an_enum = null, ?A $optional_just_an_A = null, ?Set<int> $optional_set_of_i32 = null, ?Vector<int> $optional_list_of_i32 = null, ?Vector<string> $optional_list_of_string = null, ?Map<string, int> $optional_map_of_string_to_i32 = null, ?Map<string, A> $optional_map_of_string_to_A = null, ?Map<string, Vector<int>> $optional_map_of_string_to_list_of_i32 = null, ?Map<string, Vector<A>> $optional_map_of_string_to_list_of_A = null, ?Map<string, Set<int>> $optional_map_of_string_to_set_of_i32 = null, ?Enum $optional_enum = null  ) {
    $this->just_an_A = $just_an_A;
    $this->set_of_i32 = $set_of_i32 ?? Set {};
    $this->list_of_i32 = $list_of_i32 ?? Vector {};
    $this->list_of_string = $list_of_string ?? Vector {};
    $this->map_of_string_to_i32 = $map_of_string_to_i32 ?? Map {};
    $this->map_of_string_to_A = $map_of_string_to_A ?? Map {};
    $this->map_of_string_to_list_of_i32 = $map_of_string_to_list_of_i32 ?? Map {};
    $this->map_of_string_to_list_of_A = $map_of_string_to_list_of_A ?? Map {};
    $this->map_of_string_to_set_of_i32 = $map_of_string_to_set_of_i32 ?? Map {};
    $this->map_of_string_to_map_of_string_to_i32 = $map_of_string_to_map_of_string_to_i32 ?? Map {};
    $this->map_of_string_to_map_of_string_to_A = $map_of_string_to_map_of_string_to_A ?? Map {};
    $this->list_of_set_of_i32 = $list_of_set_of_i32 ?? Vector {};
    $this->list_of_map_of_string_to_list_of_A = $list_of_map_of_string_to_list_of_A ?? Vector {};
    $this->list_of_map_of_string_to_A = $list_of_map_of_string_to_A ?? Vector {};
    $this->list_of_self = $list_of_self ?? Vector {};
    $this->map_of_string_to_self = $map_of_string_to_self ?? Map {};
    $this->just_an_enum = $just_an_enum;
    $this->optional_just_an_A = $optional_just_an_A;
    $this->optional_set_of_i32 = $optional_set_of_i32;
    $this->optional_list_of_i32 = $optional_list_of_i32;
    $this->optional_list_of_string = $optional_list_of_string;
    $this->optional_map_of_string_to_i32 = $optional_map_of_string_to_i32;
    $this->optional_map_of_string_to_A = $optional_map_of_string_to_A;
    $this->optional_map_of_string_to_list_of_i32 = $optional_map_of_string_to_list_of_i32;
    $this->optional_map_of_string_to_list_of_A = $optional_map_of_string_to_list_of_A;
    $this->optional_map_of_string_to_set_of_i32 = $optional_map_of_string_to_set_of_i32;
    $this->optional_enum = $optional_enum;
  }

  <<__Rx>>
  public static function withDefaultValues(): this {
    return new static();
  }

  <<__Rx>>
  public static function fromShape(self::TConstructorShape $shape): this {
    return new static(
      Shapes::idx($shape, 'just_an_A'),
      Shapes::idx($shape, 'set_of_i32'),
      Shapes::idx($shape, 'list_of_i32'),
      Shapes::idx($shape, 'list_of_string'),
      Shapes::idx($shape, 'map_of_string_to_i32'),
      Shapes::idx($shape, 'map_of_string_to_A'),
      Shapes::idx($shape, 'map_of_string_to_list_of_i32'),
      Shapes::idx($shape, 'map_of_string_to_list_of_A'),
      Shapes::idx($shape, 'map_of_string_to_set_of_i32'),
      Shapes::idx($shape, 'map_of_string_to_map_of_string_to_i32'),
      Shapes::idx($shape, 'map_of_string_to_map_of_string_to_A'),
      Shapes::idx($shape, 'list_of_set_of_i32'),
      Shapes::idx($shape, 'list_of_map_of_string_to_list_of_A'),
      Shapes::idx($shape, 'list_of_map_of_string_to_A'),
      Shapes::idx($shape, 'list_of_self'),
      Shapes::idx($shape, 'map_of_string_to_self'),
      Shapes::idx($shape, 'just_an_enum'),
      Shapes::idx($shape, 'optional_just_an_A'),
      Shapes::idx($shape, 'optional_set_of_i32'),
      Shapes::idx($shape, 'optional_list_of_i32'),
      Shapes::idx($shape, 'optional_list_of_string'),
      Shapes::idx($shape, 'optional_map_of_string_to_i32'),
      Shapes::idx($shape, 'optional_map_of_string_to_A'),
      Shapes::idx($shape, 'optional_map_of_string_to_list_of_i32'),
      Shapes::idx($shape, 'optional_map_of_string_to_list_of_A'),
      Shapes::idx($shape, 'optional_map_of_string_to_set_of_i32'),
      Shapes::idx($shape, 'optional_enum'),
    );
  }

  public function getName(): string {
    return 'B';
  }

  public static function getAllStructuredAnnotations(): \TStructAnnotations {
    return shape(
      'struct' => dict[],
      'fields' => dict[
      ],
    );
  }

  public static function __stringifyMapKeys<T>(Map<arraykey, T> $m): Map<string, T> {
    $new_map = Map {};
    foreach ($m as $k => $v) {
      $new_map[(string)$k] = $v;
    }
    return $new_map;
  }

  <<__Rx>>
  public static function __fromShape(self::TShape $shape): this {
    $me = new static();
    if (Shapes::idx($shape, 'just_an_A') !== null) {
      $me->just_an_A = A::__fromShape($shape['just_an_A']);
    }
    $me->set_of_i32 = new Set(Keyset\keys($shape['set_of_i32']));
    $me->list_of_i32 = (new Vector($shape['list_of_i32']));
    $me->list_of_string = (new Vector($shape['list_of_string']));
    $me->map_of_string_to_i32 = self::__stringifyMapKeys(new Map($shape['map_of_string_to_i32']));
    $me->map_of_string_to_A = self::__stringifyMapKeys(new Map($shape['map_of_string_to_A']))->map(
      $val0 ==> A::__fromShape($val0),
    );
    $me->map_of_string_to_list_of_i32 = self::__stringifyMapKeys(new Map($shape['map_of_string_to_list_of_i32']))->map(
      $val1 ==> (new Vector($val1)),
    );
    $me->map_of_string_to_list_of_A = self::__stringifyMapKeys(new Map($shape['map_of_string_to_list_of_A']))->map(
      $val2 ==> (new Vector($val2))->map(
        $val3 ==> A::__fromShape($val3),
      ),
    );
    $me->map_of_string_to_set_of_i32 = self::__stringifyMapKeys(new Map($shape['map_of_string_to_set_of_i32']))->map(
      $val4 ==> new Set(Keyset\keys($val4)),
    );
    $me->map_of_string_to_map_of_string_to_i32 = self::__stringifyMapKeys(new Map($shape['map_of_string_to_map_of_string_to_i32']))->map(
      $val5 ==> self::__stringifyMapKeys(new Map($val5)),
    );
    $me->map_of_string_to_map_of_string_to_A = self::__stringifyMapKeys(new Map($shape['map_of_string_to_map_of_string_to_A']))->map(
      $val6 ==> self::__stringifyMapKeys(new Map($val6))->map(
        $val7 ==> A::__fromShape($val7),
      ),
    );
    $me->list_of_set_of_i32 = (new Vector($shape['list_of_set_of_i32']))->map(
      $val8 ==> new Set(Keyset\keys($val8)),
    );
    $me->list_of_map_of_string_to_list_of_A = (new Vector($shape['list_of_map_of_string_to_list_of_A']))->map(
      $val9 ==> self::__stringifyMapKeys(new Map($val9))->map(
        $val10 ==> (new Vector($val10))->map(
          $val11 ==> A::__fromShape($val11),
        ),
      ),
    );
    $me->list_of_map_of_string_to_A = (new Vector($shape['list_of_map_of_string_to_A']))->map(
      $val12 ==> self::__stringifyMapKeys(new Map($val12))->map(
        $val13 ==> A::__fromShape($val13),
      ),
    );
    $me->list_of_self = (new Vector($shape['list_of_self']))->map(
      $val14 ==> B::__fromShape($val14),
    );
    $me->map_of_string_to_self = self::__stringifyMapKeys(new Map($shape['map_of_string_to_self']))->map(
      $val15 ==> B::__fromShape($val15),
    );
    if (Shapes::idx($shape, 'just_an_enum') !== null) {
      $me->just_an_enum = $shape['just_an_enum'];
    }
    if (Shapes::idx($shape, 'optional_just_an_A') !== null) {
      $me->optional_just_an_A = A::__fromShape($shape['optional_just_an_A']);
    }
    if (Shapes::idx($shape, 'optional_set_of_i32') !== null) {
      $me->optional_set_of_i32 = new Set(Keyset\keys($shape['optional_set_of_i32']));
    }
    if (Shapes::idx($shape, 'optional_list_of_i32') !== null) {
      $me->optional_list_of_i32 = (new Vector($shape['optional_list_of_i32']));
    }
    if (Shapes::idx($shape, 'optional_list_of_string') !== null) {
      $me->optional_list_of_string = (new Vector($shape['optional_list_of_string']));
    }
    if (Shapes::idx($shape, 'optional_map_of_string_to_i32') !== null) {
      $me->optional_map_of_string_to_i32 = self::__stringifyMapKeys(new Map($shape['optional_map_of_string_to_i32']));
    }
    if (Shapes::idx($shape, 'optional_map_of_string_to_A') !== null) {
      $me->optional_map_of_string_to_A = self::__stringifyMapKeys(new Map($shape['optional_map_of_string_to_A']))->map(
        $val16 ==> A::__fromShape($val16),
      );
    }
    if (Shapes::idx($shape, 'optional_map_of_string_to_list_of_i32') !== null) {
      $me->optional_map_of_string_to_list_of_i32 = self::__stringifyMapKeys(new Map($shape['optional_map_of_string_to_list_of_i32']))->map(
        $val17 ==> (new Vector($val17)),
      );
    }
    if (Shapes::idx($shape, 'optional_map_of_string_to_list_of_A') !== null) {
      $me->optional_map_of_string_to_list_of_A = self::__stringifyMapKeys(new Map($shape['optional_map_of_string_to_list_of_A']))->map(
        $val18 ==> (new Vector($val18))->map(
          $val19 ==> A::__fromShape($val19),
        ),
      );
    }
    if (Shapes::idx($shape, 'optional_map_of_string_to_set_of_i32') !== null) {
      $me->optional_map_of_string_to_set_of_i32 = self::__stringifyMapKeys(new Map($shape['optional_map_of_string_to_set_of_i32']))->map(
        $val20 ==> new Set(Keyset\keys($val20)),
      );
    }
    if (Shapes::idx($shape, 'optional_enum') !== null) {
      $me->optional_enum = $shape['optional_enum'];
    }
    return $me;
  }

  <<__Rx>>
  public function __toShape(): self::TShape {
    return shape(
      'just_an_A' => $this->just_an_A?->__toShape(),
      'set_of_i32' => ThriftUtil::toDArray(Dict\fill_keys($this->set_of_i32->toValuesArray(), true)),
      'list_of_i32' => vec($this->list_of_i32),
      'list_of_string' => vec($this->list_of_string),
      'map_of_string_to_i32' => dict($this->map_of_string_to_i32),
      'map_of_string_to_A' => $this->map_of_string_to_A->map(
        ($_val0) ==> $_val0->__toShape(),
      )
        |> dict($$),
      'map_of_string_to_list_of_i32' => $this->map_of_string_to_list_of_i32->map(
        ($_val0) ==> vec($_val0),
      )
        |> dict($$),
      'map_of_string_to_list_of_A' => $this->map_of_string_to_list_of_A->map(
        ($_val0) ==> $_val0->map(
          ($_val1) ==> $_val1->__toShape(),
        )
          |> vec($$),
      )
        |> dict($$),
      'map_of_string_to_set_of_i32' => $this->map_of_string_to_set_of_i32->map(
        ($_val0) ==> ThriftUtil::toDArray(Dict\fill_keys($_val0, true)),
      )
        |> dict($$),
      'map_of_string_to_map_of_string_to_i32' => $this->map_of_string_to_map_of_string_to_i32->map(
        ($_val0) ==> dict($_val0),
      )
        |> dict($$),
      'map_of_string_to_map_of_string_to_A' => $this->map_of_string_to_map_of_string_to_A->map(
        ($_val0) ==> $_val0->map(
          ($_val1) ==> $_val1->__toShape(),
        )
          |> dict($$),
      )
        |> dict($$),
      'list_of_set_of_i32' => $this->list_of_set_of_i32->map(
        ($_val0) ==> ThriftUtil::toDArray(Dict\fill_keys($_val0, true)),
      )
        |> vec($$),
      'list_of_map_of_string_to_list_of_A' => $this->list_of_map_of_string_to_list_of_A->map(
        ($_val0) ==> $_val0->map(
          ($_val1) ==> $_val1->map(
            ($_val2) ==> $_val2->__toShape(),
          )
            |> vec($$),
        )
          |> dict($$),
      )
        |> vec($$),
      'list_of_map_of_string_to_A' => $this->list_of_map_of_string_to_A->map(
        ($_val0) ==> $_val0->map(
          ($_val1) ==> $_val1->__toShape(),
        )
          |> dict($$),
      )
        |> vec($$),
      'list_of_self' => $this->list_of_self->map(
        ($_val0) ==> $_val0->__toShape(),
      )
        |> vec($$),
      'map_of_string_to_self' => $this->map_of_string_to_self->map(
        ($_val0) ==> $_val0->__toShape(),
      )
        |> dict($$),
      'just_an_enum' => $this->just_an_enum,
      'optional_just_an_A' => $this->optional_just_an_A?->__toShape(),
      'optional_set_of_i32' => $this->optional_set_of_i32
        |> $$ === null ? null : ThriftUtil::toDArray(Dict\fill_keys($$->toValuesArray(), true)),
      'optional_list_of_i32' => $this->optional_list_of_i32
        |> $$ === null ? null : vec($$),
      'optional_list_of_string' => $this->optional_list_of_string
        |> $$ === null ? null : vec($$),
      'optional_map_of_string_to_i32' => $this->optional_map_of_string_to_i32
        |> $$ === null ? null : dict($$),
      'optional_map_of_string_to_A' => $this->optional_map_of_string_to_A?->map(
        ($_val0) ==> $_val0->__toShape(),
      )
        |> $$ === null ? null : dict($$),
      'optional_map_of_string_to_list_of_i32' => $this->optional_map_of_string_to_list_of_i32?->map(
        ($_val0) ==> vec($_val0),
      )
        |> $$ === null ? null : dict($$),
      'optional_map_of_string_to_list_of_A' => $this->optional_map_of_string_to_list_of_A?->map(
        ($_val0) ==> $_val0->map(
          ($_val1) ==> $_val1->__toShape(),
        )
          |> vec($$),
      )
        |> $$ === null ? null : dict($$),
      'optional_map_of_string_to_set_of_i32' => $this->optional_map_of_string_to_set_of_i32?->map(
        ($_val0) ==> ThriftUtil::toDArray(Dict\fill_keys($_val0, true)),
      )
        |> $$ === null ? null : dict($$),
      'optional_enum' => $this->optional_enum,
    );
  }
}

