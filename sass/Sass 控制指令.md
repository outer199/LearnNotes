# Sass 控制指令
### @if
```sass
@if 条件 {
    样式
} @else if 条件 {

} @else {

}
```

### @for
```sass
@for $var from <开始值> to/through <结束值> {
    ...
}

to: $var 到结束值立即停止
through: $var 到结束的值 + 1 才停止

$colums: 4;
@for $i from 1 through $colums {
  .col-#{$i} {
    width: 100% / $colums * $i;
  }
}
```

### @each
```sass
$icons: success error warning;
@each $icon in $icons {
  .icon-#{$icon} {
    background-image: url("../images/icons/#{$icon}.png");
  }
}
```

### @while
```sass
@while 条件 {
    ...
}

$i: 6;
@while $i > 0 {
  .item-#{$i} {
    width: 5px * $i;
  }

  $i: $i - 2;
}
```

### @function @return @warn @error
```sass
@function 名称 (参数1, 参数2) {

}

// 函数
$colorss: (light: #ffffff, dark: #000000);
@function color($key) {
  @if not map-has-key($colorss, $key) {
    @error "在 $colorss 中没找到 #{$key}";
  }
  @return map-get($colorss, $key);
}

.by {
  background-color: color(dark1);
}

```