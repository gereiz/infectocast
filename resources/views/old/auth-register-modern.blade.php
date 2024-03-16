@extends('layouts.master-without-nav')
@section('title')
    {{ __('Register') }}
@endsection
@section('content')

    <body class="font-public">

        <div
            class="relative flex flex-col w-full overflow-hidden xl:flex-row to-custom-800 bg-gradient-to-r from-custom-900 dark:to-custom-900 dark:from-custom-950">
            <div class="absolute inset-0 bg-pattern-2 opacity-20">
                <img src="data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' version='1.1' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.dev/svgjs' width='2000' height='1000' preserveAspectRatio='none' viewBox='0 0 2000 1000'%3e%3cg mask='url(%26quot%3b%23SvgjsMask1203%26quot%3b)' fill='none'%3e%3cpath d='M25.24 -18.32L52.09 -2.82L52.09 28.18L25.24 43.68L-1.61 28.18L-1.61 -2.82zM25.24 74.68L52.09 90.18L52.09 121.18L25.24 136.68L-1.61 121.18L-1.61 90.18zM52.09 400.18L78.94 415.68L78.94 446.68L52.09 462.18L25.24 446.68L25.24 415.68zM25.24 539.68L52.09 555.18L52.09 586.18L25.24 601.68L-1.61 586.18L-1.61 555.18zM52.09 772.18L78.94 787.68L78.94 818.68L52.09 834.18L25.24 818.68L25.24 787.68zM105.78 121.18L132.63 136.68L132.63 167.68L105.78 183.18L78.94 167.68L78.94 136.68zM105.78 307.18L132.63 322.68L132.63 353.68L105.78 369.18L78.94 353.68L78.94 322.68zM105.78 400.18L132.63 415.68L132.63 446.68L105.78 462.18L78.94 446.68L78.94 415.68zM78.94 539.68L105.78 555.18L105.78 586.18L78.94 601.68L52.09 586.18L52.09 555.18zM105.78 865.18L132.63 880.68L132.63 911.68L105.78 927.18L78.94 911.68L78.94 880.68zM78.94 911.68L105.78 927.18L105.78 958.18L78.94 973.68L52.09 958.18L52.09 927.18zM159.48 121.18L186.33 136.68L186.33 167.68L159.48 183.18L132.63 167.68L132.63 136.68zM132.63 167.68L159.48 183.18L159.48 214.18L132.63 229.68L105.78 214.18L105.78 183.18zM159.48 214.18L186.33 229.68L186.33 260.68L159.48 276.18L132.63 260.68L132.63 229.68zM132.63 260.68L159.48 276.18L159.48 307.18L132.63 322.68L105.78 307.18L105.78 276.18zM132.63 818.68L159.48 834.18L159.48 865.18L132.63 880.68L105.78 865.18L105.78 834.18zM159.48 865.18L186.33 880.68L186.33 911.68L159.48 927.18L132.63 911.68L132.63 880.68zM186.33 -18.32L213.17 -2.82L213.17 28.18L186.33 43.68L159.48 28.18L159.48 -2.82zM186.33 167.68L213.17 183.18L213.17 214.18L186.33 229.68L159.48 214.18L159.48 183.18zM213.17 307.18L240.02 322.68L240.02 353.68L213.17 369.18L186.33 353.68L186.33 322.68zM213.17 400.18L240.02 415.68L240.02 446.68L213.17 462.18L186.33 446.68L186.33 415.68zM213.17 586.18L240.02 601.68L240.02 632.68L213.17 648.18L186.33 632.68L186.33 601.68zM186.33 632.68L213.17 648.18L213.17 679.18L186.33 694.68L159.48 679.18L159.48 648.18zM213.17 865.18L240.02 880.68L240.02 911.68L213.17 927.18L186.33 911.68L186.33 880.68zM266.87 307.18L293.72 322.68L293.72 353.68L266.87 369.18L240.02 353.68L240.02 322.68zM240.02 539.68L266.87 555.18L266.87 586.18L240.02 601.68L213.17 586.18L213.17 555.18zM240.02 725.68L266.87 741.18L266.87 772.18L240.02 787.68L213.17 772.18L213.17 741.18zM240.02 818.68L266.87 834.18L266.87 865.18L240.02 880.68L213.17 865.18L213.17 834.18zM320.56 28.18L347.41 43.68L347.41 74.68L320.56 90.18L293.72 74.68L293.72 43.68zM320.56 214.18L347.41 229.68L347.41 260.68L320.56 276.18L293.72 260.68L293.72 229.68zM320.56 307.18L347.41 322.68L347.41 353.68L320.56 369.18L293.72 353.68L293.72 322.68zM320.56 772.18L347.41 787.68L347.41 818.68L320.56 834.18L293.72 818.68L293.72 787.68zM347.41 -18.32L374.26 -2.82L374.26 28.18L347.41 43.68L320.56 28.18L320.56 -2.82zM347.41 74.68L374.26 90.18L374.26 121.18L347.41 136.68L320.56 121.18L320.56 90.18zM347.41 167.68L374.26 183.18L374.26 214.18L347.41 229.68L320.56 214.18L320.56 183.18zM374.26 214.18L401.11 229.68L401.11 260.68L374.26 276.18L347.41 260.68L347.41 229.68zM347.41 260.68L374.26 276.18L374.26 307.18L347.41 322.68L320.56 307.18L320.56 276.18zM347.41 353.68L374.26 369.18L374.26 400.18L347.41 415.68L320.56 400.18L320.56 369.18zM374.26 772.18L401.11 787.68L401.11 818.68L374.26 834.18L347.41 818.68L347.41 787.68zM347.41 911.68L374.26 927.18L374.26 958.18L347.41 973.68L320.56 958.18L320.56 927.18zM374.26 958.18L401.11 973.68L401.11 1004.68L374.26 1020.18L347.41 1004.68L347.41 973.68zM401.11 -18.32L427.95 -2.82L427.95 28.18L401.11 43.68L374.26 28.18L374.26 -2.82zM401.11 446.68L427.95 462.18L427.95 493.18L401.11 508.68L374.26 493.18L374.26 462.18zM427.95 493.18L454.8 508.68L454.8 539.68L427.95 555.18L401.11 539.68L401.11 508.68zM427.95 958.18L454.8 973.68L454.8 1004.68L427.95 1020.18L401.11 1004.68L401.11 973.68zM481.65 214.18L508.5 229.68L508.5 260.68L481.65 276.18L454.8 260.68L454.8 229.68zM454.8 260.68L481.65 276.18L481.65 307.18L454.8 322.68L427.95 307.18L427.95 276.18zM481.65 307.18L508.5 322.68L508.5 353.68L481.65 369.18L454.8 353.68L454.8 322.68zM454.8 446.68L481.65 462.18L481.65 493.18L454.8 508.68L427.95 493.18L427.95 462.18zM481.65 586.18L508.5 601.68L508.5 632.68L481.65 648.18L454.8 632.68L454.8 601.68zM481.65 679.18L508.5 694.68L508.5 725.68L481.65 741.18L454.8 725.68L454.8 694.68zM481.65 772.18L508.5 787.68L508.5 818.68L481.65 834.18L454.8 818.68L454.8 787.68zM481.65 865.18L508.5 880.68L508.5 911.68L481.65 927.18L454.8 911.68L454.8 880.68zM535.34 121.18L562.19 136.68L562.19 167.68L535.34 183.18L508.5 167.68L508.5 136.68zM508.5 446.68L535.34 462.18L535.34 493.18L508.5 508.68L481.65 493.18L481.65 462.18zM535.34 586.18L562.19 601.68L562.19 632.68L535.34 648.18L508.5 632.68L508.5 601.68zM535.34 865.18L562.19 880.68L562.19 911.68L535.34 927.18L508.5 911.68L508.5 880.68zM535.34 958.18L562.19 973.68L562.19 1004.68L535.34 1020.18L508.5 1004.68L508.5 973.68zM562.19 74.68L589.04 90.18L589.04 121.18L562.19 136.68L535.34 121.18L535.34 90.18zM589.04 121.18L615.89 136.68L615.89 167.68L589.04 183.18L562.19 167.68L562.19 136.68zM562.19 632.68L589.04 648.18L589.04 679.18L562.19 694.68L535.34 679.18L535.34 648.18zM562.19 725.68L589.04 741.18L589.04 772.18L562.19 787.68L535.34 772.18L535.34 741.18zM589.04 865.18L615.89 880.68L615.89 911.68L589.04 927.18L562.19 911.68L562.19 880.68zM562.19 911.68L589.04 927.18L589.04 958.18L562.19 973.68L535.34 958.18L535.34 927.18zM589.04 958.18L615.89 973.68L615.89 1004.68L589.04 1020.18L562.19 1004.68L562.19 973.68zM615.89 167.68L642.73 183.18L642.73 214.18L615.89 229.68L589.04 214.18L589.04 183.18zM642.73 307.18L669.58 322.68L669.58 353.68L642.73 369.18L615.89 353.68L615.89 322.68zM615.89 446.68L642.73 462.18L642.73 493.18L615.89 508.68L589.04 493.18L589.04 462.18zM642.73 772.18L669.58 787.68L669.58 818.68L642.73 834.18L615.89 818.68L615.89 787.68zM615.89 818.68L642.73 834.18L642.73 865.18L615.89 880.68L589.04 865.18L589.04 834.18zM669.58 74.68L696.43 90.18L696.43 121.18L669.58 136.68L642.73 121.18L642.73 90.18zM696.43 400.18L723.28 415.68L723.28 446.68L696.43 462.18L669.58 446.68L669.58 415.68zM669.58 539.68L696.43 555.18L696.43 586.18L669.58 601.68L642.73 586.18L642.73 555.18zM696.43 679.18L723.28 694.68L723.28 725.68L696.43 741.18L669.58 725.68L669.58 694.68zM696.43 772.18L723.28 787.68L723.28 818.68L696.43 834.18L669.58 818.68L669.58 787.68zM669.58 818.68L696.43 834.18L696.43 865.18L669.58 880.68L642.73 865.18L642.73 834.18zM723.28 -18.32L750.12 -2.82L750.12 28.18L723.28 43.68L696.43 28.18L696.43 -2.82zM723.28 74.68L750.12 90.18L750.12 121.18L723.28 136.68L696.43 121.18L696.43 90.18zM750.12 121.18L776.97 136.68L776.97 167.68L750.12 183.18L723.28 167.68L723.28 136.68zM750.12 214.18L776.97 229.68L776.97 260.68L750.12 276.18L723.28 260.68L723.28 229.68zM750.12 307.18L776.97 322.68L776.97 353.68L750.12 369.18L723.28 353.68L723.28 322.68zM723.28 539.68L750.12 555.18L750.12 586.18L723.28 601.68L696.43 586.18L696.43 555.18zM723.28 911.68L750.12 927.18L750.12 958.18L723.28 973.68L696.43 958.18L696.43 927.18zM803.82 28.18L830.67 43.68L830.67 74.68L803.82 90.18L776.97 74.68L776.97 43.68zM776.97 632.68L803.82 648.18L803.82 679.18L776.97 694.68L750.12 679.18L750.12 648.18zM776.97 911.68L803.82 927.18L803.82 958.18L776.97 973.68L750.12 958.18L750.12 927.18zM803.82 958.18L830.67 973.68L830.67 1004.68L803.82 1020.18L776.97 1004.68L776.97 973.68zM830.67 167.68L857.51 183.18L857.51 214.18L830.67 229.68L803.82 214.18L803.82 183.18zM857.51 400.18L884.36 415.68L884.36 446.68L857.51 462.18L830.67 446.68L830.67 415.68zM884.36 539.68L911.21 555.18L911.21 586.18L884.36 601.68L857.51 586.18L857.51 555.18zM911.21 586.18L938.06 601.68L938.06 632.68L911.21 648.18L884.36 632.68L884.36 601.68zM911.21 958.18L938.06 973.68L938.06 1004.68L911.21 1020.18L884.36 1004.68L884.36 973.68zM884.36 1004.68L911.21 1020.18L911.21 1051.18L884.36 1066.68L857.51 1051.18L857.51 1020.18zM964.9 28.18L991.75 43.68L991.75 74.68L964.9 90.18L938.06 74.68L938.06 43.68zM964.9 214.18L991.75 229.68L991.75 260.68L964.9 276.18L938.06 260.68L938.06 229.68zM938.06 260.68L964.9 276.18L964.9 307.18L938.06 322.68L911.21 307.18L911.21 276.18zM964.9 493.18L991.75 508.68L991.75 539.68L964.9 555.18L938.06 539.68L938.06 508.68zM938.06 539.68L964.9 555.18L964.9 586.18L938.06 601.68L911.21 586.18L911.21 555.18zM964.9 586.18L991.75 601.68L991.75 632.68L964.9 648.18L938.06 632.68L938.06 601.68zM964.9 958.18L991.75 973.68L991.75 1004.68L964.9 1020.18L938.06 1004.68L938.06 973.68zM1018.6 400.18L1045.45 415.68L1045.45 446.68L1018.6 462.18L991.75 446.68L991.75 415.68zM991.75 632.68L1018.6 648.18L1018.6 679.18L991.75 694.68L964.9 679.18L964.9 648.18zM1018.6 679.18L1045.45 694.68L1045.45 725.68L1018.6 741.18L991.75 725.68L991.75 694.68zM991.75 725.68L1018.6 741.18L1018.6 772.18L991.75 787.68L964.9 772.18L964.9 741.18zM1018.6 772.18L1045.45 787.68L1045.45 818.68L1018.6 834.18L991.75 818.68L991.75 787.68zM991.75 911.68L1018.6 927.18L1018.6 958.18L991.75 973.68L964.9 958.18L964.9 927.18zM1018.6 958.18L1045.45 973.68L1045.45 1004.68L1018.6 1020.18L991.75 1004.68L991.75 973.68zM1045.45 -18.32L1072.29 -2.82L1072.29 28.18L1045.45 43.68L1018.6 28.18L1018.6 -2.82zM1072.29 214.18L1099.14 229.68L1099.14 260.68L1072.29 276.18L1045.45 260.68L1045.45 229.68zM1045.45 260.68L1072.29 276.18L1072.29 307.18L1045.45 322.68L1018.6 307.18L1018.6 276.18zM1045.45 446.68L1072.29 462.18L1072.29 493.18L1045.45 508.68L1018.6 493.18L1018.6 462.18zM1072.29 679.18L1099.14 694.68L1099.14 725.68L1072.29 741.18L1045.45 725.68L1045.45 694.68zM1072.29 865.18L1099.14 880.68L1099.14 911.68L1072.29 927.18L1045.45 911.68L1045.45 880.68zM1099.14 74.68L1125.99 90.18L1125.99 121.18L1099.14 136.68L1072.29 121.18L1072.29 90.18zM1099.14 167.68L1125.99 183.18L1125.99 214.18L1099.14 229.68L1072.29 214.18L1072.29 183.18zM1125.99 214.18L1152.84 229.68L1152.84 260.68L1125.99 276.18L1099.14 260.68L1099.14 229.68zM1125.99 400.18L1152.84 415.68L1152.84 446.68L1125.99 462.18L1099.14 446.68L1099.14 415.68zM1125.99 493.18L1152.84 508.68L1152.84 539.68L1125.99 555.18L1099.14 539.68L1099.14 508.68zM1099.14 632.68L1125.99 648.18L1125.99 679.18L1099.14 694.68L1072.29 679.18L1072.29 648.18zM1099.14 725.68L1125.99 741.18L1125.99 772.18L1099.14 787.68L1072.29 772.18L1072.29 741.18zM1099.14 1004.68L1125.99 1020.18L1125.99 1051.18L1099.14 1066.68L1072.29 1051.18L1072.29 1020.18zM1179.68 214.18L1206.53 229.68L1206.53 260.68L1179.68 276.18L1152.84 260.68L1152.84 229.68zM1179.68 493.18L1206.53 508.68L1206.53 539.68L1179.68 555.18L1152.84 539.68L1152.84 508.68zM1152.84 911.68L1179.68 927.18L1179.68 958.18L1152.84 973.68L1125.99 958.18L1125.99 927.18zM1233.38 121.18L1260.23 136.68L1260.23 167.68L1233.38 183.18L1206.53 167.68L1206.53 136.68zM1233.38 400.18L1260.23 415.68L1260.23 446.68L1233.38 462.18L1206.53 446.68L1206.53 415.68zM1206.53 446.68L1233.38 462.18L1233.38 493.18L1206.53 508.68L1179.68 493.18L1179.68 462.18zM1206.53 539.68L1233.38 555.18L1233.38 586.18L1206.53 601.68L1179.68 586.18L1179.68 555.18zM1206.53 632.68L1233.38 648.18L1233.38 679.18L1206.53 694.68L1179.68 679.18L1179.68 648.18zM1233.38 772.18L1260.23 787.68L1260.23 818.68L1233.38 834.18L1206.53 818.68L1206.53 787.68zM1233.38 865.18L1260.23 880.68L1260.23 911.68L1233.38 927.18L1206.53 911.68L1206.53 880.68zM1260.23 260.68L1287.07 276.18L1287.07 307.18L1260.23 322.68L1233.38 307.18L1233.38 276.18zM1260.23 446.68L1287.07 462.18L1287.07 493.18L1260.23 508.68L1233.38 493.18L1233.38 462.18zM1260.23 539.68L1287.07 555.18L1287.07 586.18L1260.23 601.68L1233.38 586.18L1233.38 555.18zM1260.23 632.68L1287.07 648.18L1287.07 679.18L1260.23 694.68L1233.38 679.18L1233.38 648.18zM1287.07 865.18L1313.92 880.68L1313.92 911.68L1287.07 927.18L1260.23 911.68L1260.23 880.68zM1287.07 958.18L1313.92 973.68L1313.92 1004.68L1287.07 1020.18L1260.23 1004.68L1260.23 973.68zM1260.23 1004.68L1287.07 1020.18L1287.07 1051.18L1260.23 1066.68L1233.38 1051.18L1233.38 1020.18zM1340.77 28.18L1367.62 43.68L1367.62 74.68L1340.77 90.18L1313.92 74.68L1313.92 43.68zM1313.92 260.68L1340.77 276.18L1340.77 307.18L1313.92 322.68L1287.07 307.18L1287.07 276.18zM1340.77 307.18L1367.62 322.68L1367.62 353.68L1340.77 369.18L1313.92 353.68L1313.92 322.68zM1340.77 772.18L1367.62 787.68L1367.62 818.68L1340.77 834.18L1313.92 818.68L1313.92 787.68zM1340.77 958.18L1367.62 973.68L1367.62 1004.68L1340.77 1020.18L1313.92 1004.68L1313.92 973.68zM1394.47 121.18L1421.31 136.68L1421.31 167.68L1394.47 183.18L1367.62 167.68L1367.62 136.68zM1367.62 260.68L1394.47 276.18L1394.47 307.18L1367.62 322.68L1340.77 307.18L1340.77 276.18zM1394.47 400.18L1421.31 415.68L1421.31 446.68L1394.47 462.18L1367.62 446.68L1367.62 415.68zM1367.62 446.68L1394.47 462.18L1394.47 493.18L1367.62 508.68L1340.77 493.18L1340.77 462.18zM1367.62 539.68L1394.47 555.18L1394.47 586.18L1367.62 601.68L1340.77 586.18L1340.77 555.18zM1367.62 725.68L1394.47 741.18L1394.47 772.18L1367.62 787.68L1340.77 772.18L1340.77 741.18zM1367.62 818.68L1394.47 834.18L1394.47 865.18L1367.62 880.68L1340.77 865.18L1340.77 834.18zM1394.47 958.18L1421.31 973.68L1421.31 1004.68L1394.47 1020.18L1367.62 1004.68L1367.62 973.68zM1421.31 -18.32L1448.16 -2.82L1448.16 28.18L1421.31 43.68L1394.47 28.18L1394.47 -2.82zM1421.31 74.68L1448.16 90.18L1448.16 121.18L1421.31 136.68L1394.47 121.18L1394.47 90.18zM1448.16 121.18L1475.01 136.68L1475.01 167.68L1448.16 183.18L1421.31 167.68L1421.31 136.68zM1421.31 539.68L1448.16 555.18L1448.16 586.18L1421.31 601.68L1394.47 586.18L1394.47 555.18zM1421.31 818.68L1448.16 834.18L1448.16 865.18L1421.31 880.68L1394.47 865.18L1394.47 834.18zM1475.01 74.68L1501.86 90.18L1501.86 121.18L1475.01 136.68L1448.16 121.18L1448.16 90.18zM1475.01 446.68L1501.86 462.18L1501.86 493.18L1475.01 508.68L1448.16 493.18L1448.16 462.18zM1475.01 539.68L1501.86 555.18L1501.86 586.18L1475.01 601.68L1448.16 586.18L1448.16 555.18zM1501.86 865.18L1528.7 880.68L1528.7 911.68L1501.86 927.18L1475.01 911.68L1475.01 880.68zM1475.01 1004.68L1501.86 1020.18L1501.86 1051.18L1475.01 1066.68L1448.16 1051.18L1448.16 1020.18zM1555.55 493.18L1582.4 508.68L1582.4 539.68L1555.55 555.18L1528.7 539.68L1528.7 508.68zM1528.7 818.68L1555.55 834.18L1555.55 865.18L1528.7 880.68L1501.86 865.18L1501.86 834.18zM1555.55 865.18L1582.4 880.68L1582.4 911.68L1555.55 927.18L1528.7 911.68L1528.7 880.68zM1528.7 1004.68L1555.55 1020.18L1555.55 1051.18L1528.7 1066.68L1501.86 1051.18L1501.86 1020.18zM1609.25 28.18L1636.09 43.68L1636.09 74.68L1609.25 90.18L1582.4 74.68L1582.4 43.68zM1582.4 353.68L1609.25 369.18L1609.25 400.18L1582.4 415.68L1555.55 400.18L1555.55 369.18zM1582.4 1004.68L1609.25 1020.18L1609.25 1051.18L1582.4 1066.68L1555.55 1051.18L1555.55 1020.18zM1636.09 74.68L1662.94 90.18L1662.94 121.18L1636.09 136.68L1609.25 121.18L1609.25 90.18zM1662.94 214.18L1689.79 229.68L1689.79 260.68L1662.94 276.18L1636.09 260.68L1636.09 229.68zM1662.94 493.18L1689.79 508.68L1689.79 539.68L1662.94 555.18L1636.09 539.68L1636.09 508.68zM1636.09 539.68L1662.94 555.18L1662.94 586.18L1636.09 601.68L1609.25 586.18L1609.25 555.18zM1662.94 772.18L1689.79 787.68L1689.79 818.68L1662.94 834.18L1636.09 818.68L1636.09 787.68zM1662.94 865.18L1689.79 880.68L1689.79 911.68L1662.94 927.18L1636.09 911.68L1636.09 880.68zM1689.79 -18.32L1716.64 -2.82L1716.64 28.18L1689.79 43.68L1662.94 28.18L1662.94 -2.82zM1716.64 28.18L1743.48 43.68L1743.48 74.68L1716.64 90.18L1689.79 74.68L1689.79 43.68zM1689.79 353.68L1716.64 369.18L1716.64 400.18L1689.79 415.68L1662.94 400.18L1662.94 369.18zM1716.64 400.18L1743.48 415.68L1743.48 446.68L1716.64 462.18L1689.79 446.68L1689.79 415.68zM1689.79 632.68L1716.64 648.18L1716.64 679.18L1689.79 694.68L1662.94 679.18L1662.94 648.18zM1716.64 679.18L1743.48 694.68L1743.48 725.68L1716.64 741.18L1689.79 725.68L1689.79 694.68zM1716.64 772.18L1743.48 787.68L1743.48 818.68L1716.64 834.18L1689.79 818.68L1689.79 787.68zM1716.64 865.18L1743.48 880.68L1743.48 911.68L1716.64 927.18L1689.79 911.68L1689.79 880.68zM1716.64 958.18L1743.48 973.68L1743.48 1004.68L1716.64 1020.18L1689.79 1004.68L1689.79 973.68zM1770.33 121.18L1797.18 136.68L1797.18 167.68L1770.33 183.18L1743.48 167.68L1743.48 136.68zM1743.48 353.68L1770.33 369.18L1770.33 400.18L1743.48 415.68L1716.64 400.18L1716.64 369.18zM1770.33 400.18L1797.18 415.68L1797.18 446.68L1770.33 462.18L1743.48 446.68L1743.48 415.68zM1770.33 586.18L1797.18 601.68L1797.18 632.68L1770.33 648.18L1743.48 632.68L1743.48 601.68zM1770.33 679.18L1797.18 694.68L1797.18 725.68L1770.33 741.18L1743.48 725.68L1743.48 694.68zM1770.33 865.18L1797.18 880.68L1797.18 911.68L1770.33 927.18L1743.48 911.68L1743.48 880.68zM1743.48 911.68L1770.33 927.18L1770.33 958.18L1743.48 973.68L1716.64 958.18L1716.64 927.18zM1797.18 -18.32L1824.03 -2.82L1824.03 28.18L1797.18 43.68L1770.33 28.18L1770.33 -2.82zM1824.03 214.18L1850.87 229.68L1850.87 260.68L1824.03 276.18L1797.18 260.68L1797.18 229.68zM1824.03 307.18L1850.87 322.68L1850.87 353.68L1824.03 369.18L1797.18 353.68L1797.18 322.68zM1797.18 353.68L1824.03 369.18L1824.03 400.18L1797.18 415.68L1770.33 400.18L1770.33 369.18zM1797.18 632.68L1824.03 648.18L1824.03 679.18L1797.18 694.68L1770.33 679.18L1770.33 648.18zM1797.18 725.68L1824.03 741.18L1824.03 772.18L1797.18 787.68L1770.33 772.18L1770.33 741.18zM1824.03 772.18L1850.87 787.68L1850.87 818.68L1824.03 834.18L1797.18 818.68L1797.18 787.68zM1824.03 865.18L1850.87 880.68L1850.87 911.68L1824.03 927.18L1797.18 911.68L1797.18 880.68zM1797.18 911.68L1824.03 927.18L1824.03 958.18L1797.18 973.68L1770.33 958.18L1770.33 927.18zM1824.03 958.18L1850.87 973.68L1850.87 1004.68L1824.03 1020.18L1797.18 1004.68L1797.18 973.68zM1850.87 -18.32L1877.72 -2.82L1877.72 28.18L1850.87 43.68L1824.03 28.18L1824.03 -2.82zM1850.87 353.68L1877.72 369.18L1877.72 400.18L1850.87 415.68L1824.03 400.18L1824.03 369.18zM1850.87 632.68L1877.72 648.18L1877.72 679.18L1850.87 694.68L1824.03 679.18L1824.03 648.18zM1850.87 818.68L1877.72 834.18L1877.72 865.18L1850.87 880.68L1824.03 865.18L1824.03 834.18zM1850.87 1004.68L1877.72 1020.18L1877.72 1051.18L1850.87 1066.68L1824.03 1051.18L1824.03 1020.18zM1904.57 74.68L1931.42 90.18L1931.42 121.18L1904.57 136.68L1877.72 121.18L1877.72 90.18zM1931.42 121.18L1958.26 136.68L1958.26 167.68L1931.42 183.18L1904.57 167.68L1904.57 136.68zM1904.57 632.68L1931.42 648.18L1931.42 679.18L1904.57 694.68L1877.72 679.18L1877.72 648.18zM1904.57 818.68L1931.42 834.18L1931.42 865.18L1904.57 880.68L1877.72 865.18L1877.72 834.18zM1904.57 911.68L1931.42 927.18L1931.42 958.18L1904.57 973.68L1877.72 958.18L1877.72 927.18zM1931.42 958.18L1958.26 973.68L1958.26 1004.68L1931.42 1020.18L1904.57 1004.68L1904.57 973.68zM1958.26 -18.32L1985.11 -2.82L1985.11 28.18L1958.26 43.68L1931.42 28.18L1931.42 -2.82zM1985.11 214.18L2011.96 229.68L2011.96 260.68L1985.11 276.18L1958.26 260.68L1958.26 229.68zM1958.26 446.68L1985.11 462.18L1985.11 493.18L1958.26 508.68L1931.42 493.18L1931.42 462.18zM1985.11 493.18L2011.96 508.68L2011.96 539.68L1985.11 555.18L1958.26 539.68L1958.26 508.68zM1985.11 772.18L2011.96 787.68L2011.96 818.68L1985.11 834.18L1958.26 818.68L1958.26 787.68zM1958.26 911.68L1985.11 927.18L1985.11 958.18L1958.26 973.68L1931.42 958.18L1931.42 927.18zM2011.96 167.68L2038.81 183.18L2038.81 214.18L2011.96 229.68L1985.11 214.18L1985.11 183.18zM2038.81 586.18L2065.65 601.68L2065.65 632.68L2038.81 648.18L2011.96 632.68L2011.96 601.68zM2011.96 818.68L2038.81 834.18L2038.81 865.18L2011.96 880.68L1985.11 865.18L1985.11 834.18z' stroke='rgba(61%2c 97%2c 213%2c 1)' stroke-width='2'%3e%3c/path%3e%3c/g%3e%3cdefs%3e%3cmask id='SvgjsMask1203'%3e%3crect width='2000' height='1000' fill='white'%3e%3c/rect%3e%3c/mask%3e%3c/defs%3e%3c/svg%3e"
                    alt="">
            </div>
            <div
                class="min-h-[calc(100vh_-_theme('spacing.4')_*_2)] mx-3 lg:w-[40rem] shrink-0 px-10 py-14 flex items-center justify-center m-4 bg-white rounded z-10 relative dark:bg-zink-700 dark:text-zink-100 md:mx-auto xl:mx-4">
                <div class="flex flex-col w-full h-full">
                    <div>
                        <div class="relative dropdown text-end">
                            <button type="button"
                                class="inline-flex items-center gap-3 transition-all duration-200 ease-linear dropdown-toggle btn border-slate-200 dark:border-zink-500 group/items focus:border-custom-500 dark:focus:border-custom-500"
                                id="dropdownMenuButton" data-bs-toggle="dropdown">
                                <img src="{{ URL::asset('build/images/flags/us.svg') }}" alt="" class="object-cover h-5 rounded-full">
                                <h6
                                    class="text-base font-medium transition-all duration-200 ease-linear text-slate-600 group-hover/items:text-custom-500 dark:text-zink-200 dark:group-hover/items:text-custom-500">
                                    English</h6>
                            </button>

                            <div class="absolute z-50 hidden p-3 mt-1 text-left list-none bg-white rounded-md shadow-md dropdown-menu min-w-[9rem] flex flex-col gap-3 dark:bg-zink-600"
                                aria-labelledby="dropdownMenuButton">
                                <a href="#!" class="flex items-center gap-3 group/items">
                                    <img src="{{ URL::asset('build/images/flags/us.svg') }}" alt=""
                                        class="object-cover h-4 rounded-full">
                                    <h6
                                        class="text-sm font-medium transition-all duration-200 ease-linear text-slate-600 group-hover/items:text-custom-500 dark:text-zink-200 dark:group-hover/items:text-custom-500">
                                        English</h6>
                                </a>
                                <a href="#!" class="flex items-center gap-3 group/items">
                                    <img src="{{ URL::asset('build/images/flags/es.svg') }}" alt=""
                                        class="object-cover h-4 rounded-full">
                                    <h6
                                        class="text-sm font-medium transition-all duration-200 ease-linear text-slate-600 group-hover/items:text-custom-500 dark:text-zink-200 dark:group-hover/items:text-custom-500">
                                        Spanish</h6>
                                </a>
                                <a href="#!" class="flex items-center gap-3 group/items">
                                    <img src="{{ URL::asset('build/images/flags/de.svg') }}" alt=""
                                        class="object-cover h-4 rounded-full">
                                    <h6
                                        class="text-sm font-medium transition-all duration-200 ease-linear text-slate-600 group-hover/items:text-custom-500 dark:text-zink-200 dark:group-hover/items:text-custom-500">
                                        German</h6>
                                </a>
                                <a href="#!" class="flex items-center gap-3 group/items">
                                    <img src="{{ URL::asset('build/images/flags/fr.svg') }}" alt=""
                                        class="object-cover h-4 rounded-full">
                                    <h6
                                        class="text-sm font-medium transition-all duration-200 ease-linear text-slate-600 group-hover/items:text-custom-500 dark:text-zink-200 dark:group-hover/items:text-custom-500">
                                        French</h6>
                                </a>
                                <a href="#!" class="flex items-center gap-3 group/items">
                                    <img src="{{ URL::asset('build/images/flags/jp.svg') }}" alt=""
                                        class="object-cover h-4 rounded-full">
                                    <h6
                                        class="text-sm font-medium transition-all duration-200 ease-linear text-slate-600 group-hover/items:text-custom-500 dark:text-zink-200 dark:group-hover/items:text-custom-500">
                                        Japanese</h6>
                                </a>
                                <a href="#!" class="flex items-center gap-3 group/items">
                                    <img src="{{ URL::asset('build/images/flags/it.svg') }}" alt=""
                                        class="object-cover h-4 rounded-full">
                                    <h6
                                        class="text-sm font-medium transition-all duration-200 ease-linear text-slate-600 group-hover/items:text-custom-500 dark:text-zink-200 dark:group-hover/items:text-custom-500">
                                        Italian</h6>
                                </a>
                                <a href="#!" class="flex items-center gap-3 group/items">
                                    <img src="{{ URL::asset('build/images/flags/ru.svg') }}" alt=""
                                        class="object-cover h-4 rounded-full">
                                    <h6
                                        class="text-sm font-medium transition-all duration-200 ease-linear text-slate-600 group-hover/items:text-custom-500 dark:text-zink-200 dark:group-hover/items:text-custom-500">
                                        Russian</h6>
                                </a>
                                <a href="#!" class="flex items-center gap-3 group/items">
                                    <img src="{{ URL::asset('build/images/flags/ae.svg') }}" alt=""
                                        class="object-cover h-4 rounded-full">
                                    <h6
                                        class="text-sm font-medium transition-all duration-200 ease-linear text-slate-600 group-hover/items:text-custom-500 dark:text-zink-200 dark:group-hover/items:text-custom-500">
                                        Arabic</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="my-auto">
                        <div class="lg:w-[20rem] mx-auto mt-10">
                            <ul class="flex flex-wrap w-full gap-2 text-sm font-medium text-center nav-tabs">
                                <li class="group grow active">
                                    <a href="javascript:void(0);" data-tab-toggle data-target="emailLogin"
                                        class="inline-block px-4 w-full py-2 text-base transition-all duration-300 ease-linear rounded-md text-slate-500 bg-slate-100 dark:text-zink-200 dark:bg-zink-600 border border-transparent group-[.active]:bg-custom-500 dark:group-[.active]:bg-custom-500 group-[.active]:text-white dark:group-[.active]:text-white hover:text-custom-500 dark:hover:text-custom-500 active:text-custom-500 dark:active:text-custom-500 -mb-[1px]"><i
                                            data-lucide="mail" class="inline-block size-4 mr-1"></i> <span
                                            class="align-middle">Email</span></a>
                                </li>
                                <li class="group grow">
                                    <a href="javascript:void(0);" data-tab-toggle data-target="phoneLogin"
                                        class="inline-block px-4 w-full py-2 text-base transition-all duration-300 ease-linear rounded-md text-slate-500 bg-slate-100 dark:text-zink-200 dark:bg-zink-600 border border-transparent group-[.active]:bg-custom-500 dark:group-[.active]:bg-custom-500 group-[.active]:text-white dark:group-[.active]:text-white hover:text-custom-500 dark:hover:text-custom-500 active:text-custom-500 dark:active:text-custom-500 -mb-[1px]"><i
                                            data-lucide="smartphone" class="inline-block size-4 mr-1"></i> <span
                                            class="align-middle">Phone</span></a>
                                </li>
                            </ul>
                        </div>
                        <div class="lg:w-[25rem] mx-auto">
                            <div class="mt-5 tab-content">
                                <div class="block tab-pane" id="emailLogin">
                                    <form action="index.html" class="mt-10" id="signInForm">
                                        <div class="hidden p-3 mb-3 text-base text-green-500 border border-green-200 rounded-md bg-green-50"
                                            id="successAlert">
                                            You have <b>successfully</b> signed in.
                                        </div>
                                        <div class="mb-3">
                                            <label for="username" class="inline-block mb-2 text-base font-medium">UserName/
                                                Email ID</label>
                                            <input type="text" id="username"
                                                class="input-text"
                                                placeholder="Enter username or email">
                                            <div id="username-error" class="hidden mt-1 text-sm text-red-500">Please enter
                                                a valid email address.</div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="password"
                                                class="inline-block mb-2 text-base font-medium">Password</label>
                                            <input type="password" id="password"
                                                class="input-text"
                                                placeholder="Enter password">
                                            <div id="password-error" class="hidden mt-1 text-sm text-red-500">Password
                                                must be at least 8 characters long and contain both letters and numbers.
                                            </div>
                                        </div>
                                        <div>
                                            <div class="flex items-center gap-2">
                                                <input id="emailCheckRememberMe"
                                                    class="size-4 border rounded-sm appearance-none bg-slate-100 border-slate-200 dark:bg-zink-600 dark:border-zink-500 checked:bg-custom-500 checked:border-custom-500 dark:checked:bg-custom-500 dark:checked:border-custom-500 checked:disabled:bg-custom-400 checked:disabled:border-custom-400"
                                                    type="checkbox" value="">
                                                <label for="emailCheckRememberMe"
                                                    class="inline-block text-base font-medium align-middle cursor-pointer">Remember
                                                    me</label>
                                            </div>
                                            <div id="remember-error" class="hidden mt-1 text-sm text-red-500">Please check
                                                the "Remember me" before submitting the form.</div>
                                        </div>
                                        <div class="mt-10">
                                            <button type="submit"
                                                class="w-full text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Sign
                                                In</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="hidden tab-pane" id="phoneLogin">
                                    <form action="index.html" class="mt-10" id="signInForm">
                                        <div class="hidden px-4 py-3 mb-3 text-sm text-green-500 border border-green-200 rounded-md bg-green-50 dark:bg-green-400/20 dark:border-green-500/50"
                                            id="successAlert">
                                            You have <b>successfully</b> signed in.
                                        </div>
                                        <div class="mb-3">
                                            <label for="phoneNumber" class="inline-block mb-2 text-base font-medium">Phone
                                                Number</label>
                                            <input type="number" id="phoneNumber"
                                                class="input-text"
                                                placeholder="Enter phone">
                                            <div id="phone-error" class="hidden mt-1 text-sm text-red-500">Please enter a
                                                valid email address.</div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="password"
                                                class="inline-block mb-2 text-base font-medium">Password</label>
                                            <input type="password" id="password"
                                                class="input-text"
                                                placeholder="Enter password">
                                            <div id="password-error" class="hidden mt-1 text-sm text-red-500">Password
                                                must be at least 8 characters long and contain both letters and numbers.
                                            </div>
                                        </div>
                                        <div>
                                            <div class="flex items-center gap-2">
                                                <input id="phoneCheckRememberMe"
                                                    class="size-4 border rounded-sm appearance-none bg-slate-100 border-slate-200 dark:bg-zink-600 dark:border-zink-500 checked:bg-custom-500 checked:border-custom-500 dark:checked:bg-custom-500 dark:checked:border-custom-500 checked:disabled:bg-custom-400 checked:disabled:border-custom-400"
                                                    type="checkbox" value="">
                                                <label for="phoneCheckRememberMe"
                                                    class="inline-block text-base font-medium align-middle cursor-pointer">Remember
                                                    me</label>
                                            </div>
                                            <div id="remember-error" class="hidden mt-1 text-sm text-red-500">Please check
                                                the "Remember me" before submitting the form.</div>
                                        </div>
                                        <div class="mt-10">
                                            <button type="submit"
                                                class="w-full font-medium text-white uppercase transition-all duration-200 ease-linear btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100">Sign
                                                In</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div
                                class="relative text-center my-9 before:absolute before:top-3 before:left-0 before:right-0 before:border-t before:border-t-slate-200 dark:before:border-t-zink-500">
                                <h5
                                    class="inline-block px-4 py-0.5 text-sm bg-white text-slate-500 dark:text-zink-200 dark:bg-zink-700 rounded relative">
                                    Already have an account ?</h5>
                            </div>

                            <div class="flex flex-wrap justify-center gap-2">
                                <button type="button"
                                    class="flex items-center justify-center size-[37.5px] transition-all duration-200 ease-linear p-0 text-custom-500 btn bg-custom-100 border-custom-100 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 active:text-white active:bg-custom-600 active:border-custom-600"><i
                                        data-lucide="facebook" class="size-4"></i></button>
                                <button type="button"
                                    class="flex items-center justify-center size-[37.5px] transition-all duration-200 ease-linear p-0 text-orange-500 btn bg-orange-100 border-orange-100 hover:text-white hover:bg-orange-600 hover:border-orange-600 focus:text-white focus:bg-orange-600 focus:border-orange-600 active:text-white active:bg-orange-600 active:border-orange-600"><i
                                        data-lucide="mail" class="size-4"></i></button>
                                <button type="button"
                                    class="flex items-center justify-center size-[37.5px] transition-all duration-200 ease-linear p-0 text-sky-500 btn bg-sky-100 border-sky-100 hover:text-white hover:bg-sky-600 hover:border-sky-600 focus:text-white focus:bg-sky-600 focus:border-sky-600 active:text-white active:bg-sky-600 active:border-sky-600"><i
                                        data-lucide="twitter" class="size-4"></i></button>
                                <button type="button"
                                    class="flex items-center justify-center size-[37.5px] transition-all duration-200 ease-linear p-0 text-slate-500 btn bg-slate-200 border-slate-200 hover:text-white hover:bg-slate-600 hover:border-slate-600 focus:text-white focus:bg-slate-600 focus:border-slate-600 active:text-white active:bg-slate-600 active:border-slate-600"><i
                                        data-lucide="github" class="size-4"></i></button>
                            </div>

                            <div class="mt-10 text-center">
                                <p class="mb-0 text-slate-500 dark:text-zink-200">Already have an account ? <a
                                        href="{{ url('auth-login-basic') }}"
                                        class="font-semibold underline transition-all duration-150 ease-linear text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500">Login</a>
                                </p>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5">
                        <p class="mb-0 text-center text-15 text-slate-500 dark:text-zink-200">©
                            <script>
                                document.write(new Date().getFullYear())
                            </script> Tailwick. Crafted with <i class="text-red-500 ri-heart-fill"></i> by
                            <a href="http://themesdesign.in"
                                class="underline transition-all duration-200 ease-linear text-slate-800 dark:text-zink-50 hover:text-custom-500 dark:hover:text-custom-500">Themesdesign</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="relative z-10 flex items-center justify-center min-h-screen px-10 text-center grow py-14">
                <div>
                    <a href="#!"><img src="{{ URL::asset('build/images/logo_infectocast.png') }}" alt=""
                            class="block mx-auto mb-14 h-7"></a>
                    <img src="{{ URL::asset('build/images/auth-modern.png') }}" alt=""
                        class="block object-cover mx-auto shadow-lg md:max-w-md rounded-xl shadow-custom-800">
                    <div class="mt-10 text-center">
                        <h3 class="mt-4 mb-3 capitalize text-custom-50">Tools for crafting your business's brand identity
                        </h3>
                        <p class="max-w-2xl text-custom-300 text-16">Unlock the potential of our versatile branding tools,
                            designed to empower your business in shaping a distinctive and impactful brand. Elevate your
                            business's image and leave a lasting impression with our comprehensive branding solutions.</p>
                    </div>
                </div>
            </div>
        </div>
    @endsection
