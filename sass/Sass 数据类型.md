# Sass 数据类型
```
打开 sass 交互环境:
    sass -i
    
    >> type-of() 获取数据类型
    >> abs() 获取绝对值
    >> round() 四舍五入
    >> ceil() 进一位 ceil(3.1) = 4
    >> floor() 退一位 floor(3.6) = 3
    >> percentage() 得到 结果% percentage(10px / 5px) = 200%
    >> min() min(1,2,3) = 1
    >> max() max(1,2,3) = 3
    
    >> to-upper-case() 大写
    >> to-lower-case() 小写
    >> str-length() 字符串长度
    >> str-index(字符串, 要判断位置的字符串) 获取某个字符串在..中开始的位置
    >> str-insert(向谁插入, 要插入的内容, 插入位置)
```
### 整型
### 字符串
### 颜色
```
字符串: red
Hex: #fff
rgb: rgb(0, 0, 0)
rgba: rgba(0, 0, 0, 1)
hsl: hsl(0, 100%, 50%) h 色相 s 饱和度 l 明度

lighten(颜色变量, 明度(30%))
draken()

saturate(颜色变量, 饱和度) 增加颜色的饱和度
desaturate()降低

opacity(颜色变量, 增加的不透明度的值) 不透明度
transparentize() 透明度
```

### 列表
使用 , 后者 空格 分隔开
```
length() 获取列表长度
nth() 得到对应序号对应的列表值 从1开始
index(列表, 要判断的值) 获取列表里的值的序号
append(列表, 要插入的值, 列表用的分隔符(space comma)) 向列表插入
join(列表1, 列表2, 列表用的分隔符(space comma)) 组合列表

```

### map 类型
```
定义: $colors:(l:#fff, d:#000)
length() 获取 map 长度
map-get(map, key) 获取 key 的值
map-keys() 获取 map 的所有key
map-values() 获取 map 的所有值
map-has-key(map, key)
map-merge(m1, m2) 合并两个map
map-remove(map, key, ...) 从 map 中移除一个或多个
```

### 布尔类型 boolean
```
xxx and  xxx
xxx or xxx
not(5px < 3px)
```

### interpolation #{xxx}
```
$version: "0.0.1";
/* 当前版本: #{$version} */

$name: 'info';
$attr: 'border';

.alert-#{$name} {
  color: red;
}

.btn {
  #{$attr}-radius: 2px;
}
```